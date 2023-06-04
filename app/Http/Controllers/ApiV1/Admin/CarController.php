<?php

namespace App\Http\Controllers\ApiV1\Admin;

use App\Enum\SabreBookingStatus;
use App\Http\Requests\UpdateBookingStatusRequest;
use App\Http\Resources\AdminPnrResource;
use App\Http\Resources\PaginatedCollection;
use App\Models\Pnr;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CarController extends AdminController
{
    public function index(Request $request)
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

        $pnrs = $pnrs->where('type','car')->orderBy('created_at','DESC');

        if(count($pnrs->get()) == 0){
            return apiResponse([],'No PNRs Found',false);
        }

        $perPage = is_null($request->per_page)? 15 : $request->per_page;

        return apiResponse(new PaginatedCollection($pnrs->paginate($perPage),AdminPnrResource::class),'List PNRs',true);
    }

    public function show($id)
    {
        $pnr = Pnr::with(['status','passengerDetails','user','client'])
            ->where('type','car')
            ->where('id',$id)->first();

        if(is_null($pnr)){
            return apiResponse(new \stdClass(),'Booking Not Found',false);
        }

        return apiResponse($pnr , 'Show Car Booking Data',true);
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


    public function statuses()
    {
        $statuses = Status::select('id','status')->get();

        return apiResponse($statuses,'List Cars Bookings Statuses',true);
    }
}
