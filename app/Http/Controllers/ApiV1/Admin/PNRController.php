<?php

namespace App\Http\Controllers\ApiV1\Admin;

use App\Enum\SabreBookingStatus;
use App\GDSIntegration\Sabre\CancelItinerarySegments;
use App\GDSIntegration\Sabre\EndTransaction;
use App\GDSIntegration\Sabre\GetReservation;
use App\GDSIntegration\Sabre\Sabre;
use App\Http\Requests\AdminPNRListRequest;
use App\Http\Requests\CancelPNRRequest;
use App\Http\Requests\UpdateBookingStatusRequest;
use App\Http\Resources\AdminPnrResource;
use App\Http\Resources\PaginatedCollection;
use App\Libs\FireBase\PushNotification;
use App\Libs\FireBase\RealTimeNotification;
use App\Models\Pnr;
use App\Models\Status;
use Carbon\Carbon;

class PNRController extends AdminController
{
    public function index(AdminPNRListRequest $request)
    {
        if($request->has('last_day')){
            $date = Carbon::now()->subDays(1);
        }
        elseif($request->has('last_week')){
            $date = Carbon::now()->subDays(7);
        }elseif ($request->has('last_month')){
            $date = Carbon::now()->subDays(30);
        }else{
            $date = Carbon::now()->subDays(7);
        }

        $pnrs = Pnr::where('created_at','>=',$date);

        if($request->has('custom_date')){
            $pnrs = Pnr::whereBetween('created_at', [
                Carbon::parse($request->start_date),
                Carbon::parse($request->end_date.' 23:59:59')
            ]);
        }

        if($request->has('client_id') && ! is_null($request->client_id) && count($request->client_id) > 0){
            $pnrs->whereIn('client_id', $request->client_id);
        }

        if($request->has('status_id') && ! is_null($request->status_id) && count($request->status_id) > 0){
            $pnrs = $pnrs->whereIn('status_id' , $request->status_id);
        }

        $pnrs = $pnrs->where('type','air')->orderBy('created_at','DESC');

        if(count($pnrs->get()) == 0){
            return apiResponse([],'No PNRs Found',false);
        }

        $perPage = is_null($request->per_page)? 15 : $request->per_page;

        return apiResponse(new PaginatedCollection($pnrs->paginate($perPage),AdminPnrResource::class),'List PNRs',true);
    }

    public function show($id)
    {
        $pnr = Pnr::with(['status','flightSegments','passengerDetails','client','user'])
            ->where('type','air')
            ->where('id',$id)->first();

        if(is_null($pnr)){
            return apiResponse(new \stdClass(),'Booking Not Found',false);
        }

        return apiResponse($pnr , 'Show Flight Booking Data',true);
    }

   public function updateStatus(UpdateBookingStatusRequest $request,$booking_id)
    {
        $pnr = Pnr::find($booking_id);
        if(is_null($pnr)){
            return apiResponse(new \stdClass(),'Booking not found',false);
        }

        if($pnr->status_id == SabreBookingStatus::CANCELLED){
            return apiResponse(new \stdClass(),'Cannot change status of cancelled booking',false);
        }

        $pnr->update(['status_id' => $request->status_id]);
        $updatedPnr = Pnr::find($booking_id);

        return apiResponse($updatedPnr,'Booking Status Updated',true);
    }


    //cancel PNR
    public function cancel(CancelPNRRequest $request)
    {
        $pnr = Pnr::where('pnr_id',$request->pnr)->where('status_id',SabreBookingStatus::CANCELLED)->first();

        if(! is_null($pnr)){
            return apiResponse([],'This PNR canceled before',false);
        }

        $sabre = new Sabre();
        try {
            $session = $sabre->getSoapSession();
        }catch (\Exception $e){
            return apiResponse(new \stdClass(),'SomeThing went Wrong, please check it on Sabre Red WorkStation.',false);
        }


        $readReservation = new GetReservation();
        $readReservation->travelItineraryRead($request->pnr,$session);

        $cancelSegments = new CancelItinerarySegments();
        $cancelSegments->cancelSegments($session);

        $endTransaction = new EndTransaction();
        $endTransactionRS = $endTransaction->endTransaction($session);

        $sabre->closeSoapSession($session);

        try{
            $status = $endTransactionRS['soap-env:Envelope']['soap-env:Body']['EndTransactionRS']['stl:ApplicationResults']['attr']['status'];

            if($status == 'Complete'){
                $pnr = Pnr::where('pnr_id',$request->pnr)->first();
                $pnr->update(['status_id' => Status::where('status','Cancelled')->first()->id]);

                $updatedPnr = Pnr::where('pnr_id',$request->pnr)->first();

                $this->sendNotificationToUser($updatedPnr);

                return apiResponse($updatedPnr,'PNR Canceled Successfully',true);
            }else{
                return apiResponse(new \stdClass(),'PNR is invalid',false);
            }
        }catch (\Exception $exception){
            sendErrorToMail($exception);
            return apiResponse(new \stdClass(),'some error happen when cancel pnr, please check it on Sabre Red WorkStation',false);
        }

    }

    private function sendNotificationToUser($pnrObject)
    {
        if(! is_null($pnrObject->user_id)){
            $realTimeNotification = new RealTimeNotification();
            $realTimeNotification->setNotification($pnrObject->pnr_id,'Your preBooking cancelled','',$pnrObject->user_id);

            if(! is_null($pnrObject->user->device_token)){
                $pushNotification = new PushNotification();
                $pushNotification->notificationToDevice($pnrObject->user->device_token,'Your preBooking cancelled',''
                    ,['pnr' => $pnrObject->pnr_id]);
            }
        }
    }

    public function statuses()
    {
        $statuses = Status::select('id','status')->get();

        return apiResponse($statuses,'List Pnr Statuses',true);
    }
}
