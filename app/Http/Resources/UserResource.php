<?php

namespace App\Http\Resources;

use App\Models\LoyaltyProgramSetting;
use Illuminate\Http\Resources\Json\JsonResource;
use Propaganistas\LaravelPhone\PhoneNumber;

class UserResource extends JsonResource
{

    protected $host;

    public function __construct($resource,$host = '')
    {
        $this->host = $host;
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $uri = $request->route()->uri();
        $actionMethod = $request->route()->getActionMethod();

        if(strpos($uri,'admin')){
            if(in_array($actionMethod,['show','updateClientBlocking','update','store'])) {
                $usersDataArray = [
                    'flightBookings' => AdminPnrResource::collection($this->pnrs()->where('type', 'air')->get()),
                    'hotelBookings' => HotelBookingResource::collection($this->hotelBookings),
                    'carBookings' => AdminPnrResource::collection($this->pnrs()->where('type', 'car')->get()),
                ];
            }
        }

        $user = [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'countryIsoCode' =>  $this->countryIsoCode(),
            'active' => $this->blockStatus(),
            'points'=> $this->available_points,
            'pointsToAmount' => $this->pointsToAmount(),
            'minPointsToRedeem'      => $this->minPointsToRedeem(),
            'role'                   => $this->userRole(),
            'permissions'            => $this->permissions,
            'registeredFrom'         => $this->registeredFrom->name ?? null,
            'originClient'           => $this->client->name ?? null
        ];

        return isset($usersDataArray) ? array_merge($user,$usersDataArray) : $user;
    }


    protected function userRole()
    {
        if($this->host == 'ats' && $this->host){
            return 'subAgent';
        }else{
            return is_null($this->roles()) ? null : $this->roles->implode('name',',');
        }
    }

    public function blockStatus()
    {
        if($this->block == 1){
            return false;
        }else{
            return true;
        }
    }

    public function pointsToAmount()
    {
        $pointsPerUnitPrice = LoyaltyProgramSetting::where('type','redeem-points-per-price')->first()->number ?? 1;
        $amount = $this->available_points / $pointsPerUnitPrice;

        return round($amount,2);
    }

    public function minPointsToRedeem()
    {
        $minPoints = LoyaltyProgramSetting::where('type','min-to-redeem')->first();

        if(is_null($minPoints))
            return 0;

        return $minPoints->number;
    }

    public function countryIsoCode()
    {
        try {
            $code = PhoneNumber::make($this->phone)->getCountry();
        }catch (\Exception $e){
            $code = '';
        }

        return $code;
    }
}
