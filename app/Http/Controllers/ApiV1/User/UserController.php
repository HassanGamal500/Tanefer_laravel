<?php

namespace App\Http\Controllers\ApiV1\User;

use Carbon\Carbon;
use App\Models\Pnr;
use App\Models\User;
use App\Models\HotelBooking;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\PnrResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\GDSIntegration\Tbo\HotelBook;
use App\Http\Resources\HotelBookResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\RedeemPointResource;
use App\Libs\FireBase\RealTimeNotification;
use App\Http\Resources\CollectPointResource;
use Illuminate\Auth\AuthenticationException;
use App\Http\Requests\UpdateNotificationRequest;
use Propaganistas\LaravelPhone\PhoneNumber;

class UserController extends Controller
{
    public function show()
    {
        // dd(auth()->guard('api')->user());
        if(is_null(auth()->guard('api')->user())){
            return apiResponse('','unauthenticated',false);
        }
        $user = User::find(auth()->guard('api')->user()->id);

        if(is_null($user)){
            return apiResponse(new \stdClass(),'Can\'t access this page',false);
        }

        return apiResponse(new UserResource($user,\request('host')),'Get User data successfully',true);
    }

    public function update(Request $request)
    {
        $client = resolve('client');
        $mainClient = $client->parentClient ?? $client;
        if(is_null(auth()->guard('api')->user())){
            return apiResponse('','unauthenticated',false);
        }


        $validate = Validator::make($request->all(),[
           'name' => 'required|string|max:191',
           'email'=> ['required','email','unique:users,email,'.auth()->guard('api')->user()->id.',id,client_id,'.$mainClient->id],
            'phone' => 'numeric|phone:countryIsoCode',
            'countryIsoCode' => 'required_with:phone'
        ],
            ['phone' => 'The :attribute field contains an invalid number.']);

        if($validate->fails()){
            return apiResponse(new \stdClass(),implode(',',$validate->errors()->all()),false);
        }

        $user = User::find(auth()->guard('api')->user()->id);
        if(is_null($user)){
            return apiResponse(new \stdClass(),'Can\'t Access this Data',false);
        }

        $phone = PhoneNumber::make($request->phone)->ofCountry($request->countryIsoCode)->formatInternational();

        $user->update(array_merge(['phone' => $phone],$request->except('phone')));

        return apiResponse(new UserResource($user),'Your Data updated',true);
    }

    // retrieve bookings of authenticated user
    public function bookings(Request $request)
    {
        if(is_null(auth()->guard('api')->user())){
            return apiResponse('','unauthenticated',false);
        }

        if($request->has('last_day')){
            $date = Carbon::now()->subDays(1);
        }
        elseif($request->has('last_week')){
            $date = Carbon::now()->subDays(7);
        }elseif ($request->has('last_month')){
            $date = Carbon::now()->subDays(30);
        }else{
            $date = Carbon::now()->subYears(7);
        }

        $pnrs = Pnr::where('user_id',auth()->guard('api')->user()->id)->where('created_at','>=',$date)->latest()->get();
        $hotels = HotelBooking::where('user_id',auth()->guard('api')->user()->id)->where('created_at','>=',$date)->latest()->get();

        if($request->has('custom_date')){
            $pnrs = Pnr::where('user_id',auth()->guard('api')->user()->id)->whereBetween('created_at', [
                Carbon::parse($request->start_date),
                Carbon::parse($request->end_date.' 23:59:59')
            ])->latest()->get();
            $hotels = HotelBooking::where('user_id',auth()->guard('api')->user()->id)->whereBetween('created_at', [
                Carbon::parse($request->start_date),
                Carbon::parse($request->end_date.' 23:59:59')
            ])->latest()->get();
        }

        if($request->has('status_id') && ! is_null($request->status_id) && count($request->status_id) > 0){
            $pnrs = $pnrs->whereIn('status_id' , $request->status_id);
        }

        if(count($pnrs) > 0 || count($hotels) > 0){
            return apiResponse(
                [
                    'FlightsBookings' => PnrResource::collection($pnrs->where('type','air')),
                    'HotelsBookings'  => HotelBookResource::collection($hotels),
                    'CarBookings'     => PnrResource::collection($pnrs->where('type','car'))
                ],'all booking retrieved successfully',true);
        }
        else{
            return apiResponse([],'No Bookings Found',false);
        }
    }

    //retrieve History of user points collected
    public function collectHistory()
    {
        if(is_null(auth()->guard('api')->user())){
            return apiResponse(new \stdClass(),'unauthenticated',false);
        }

        return CollectPointResource::collection(auth()->guard('api')->user()->collectPoints()->paginate());
    }


    //retrieve History of user points redeemed
    public function redeemHistory()
    {
        if(is_null(auth()->guard('api')->user())){
            return apiResponse(new \stdClass(),'unauthenticated',false);
        }

        return RedeemPointResource::collection(auth()->guard('api')->user()->redeemPoints()->paginate());
    }



    /**
     * updateReadability of notification
     *
     * @param Request $request
     *
     *  @return JsonResponse
     */
    public function updateNotification(UpdateNotificationRequest $request)
    {
        if(is_null(auth()->guard('api')->user())){
            return apiResponse('','unauthenticated',false);
        }

        $user_id = auth()->guard('api')->user()->id;


        $realTimeNotification = new RealTimeNotification();
        $realTimeNotification->updateReadOFNotification($user_id,$request->notification_key,$request->notification_object);

        return apiResponse('','Notification Updated',true);
    }


}
