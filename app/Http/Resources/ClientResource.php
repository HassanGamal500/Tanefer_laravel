<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * @param string
     * */
    public $controllerMethod;

    public function __construct($resource,$controllerMethod = 'index')
    {
        $this->controllerMethod = $controllerMethod;
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
        $actionMethod = $request->route()->getActionMethod();
        if(in_array($actionMethod,['show','updateClientBlocking','update'])){
            $clientsDataArray = [
                'emails' => new ClientEmailResource($this->emailSetting),
                'flightBookings' => AdminPnrResource::collection($this->pnrs()->where('type','air')->get()),
                'hotelBookings'   => HotelBookingResource::collection($this->hotelBookings),
                'carBookings'     => AdminPnrResource::collection($this->pnrs()->where('type','car')->get()),
                'users'           => UserResource::collection($this->users)
            ];
        }

        $returnArray = [
          'id'  => $this->id,
          'name' => $this->name,
          'urlOrSecret'  => $this->url,
          'email'        => $this->email ?? '',
          'termsUrl'    => $this->terms_url ?? '',
          'parentClient' => $this->parentClient->name ?? '',
          'createdAt'    => Carbon::parse($this->created_at)->format('Y-m-d H:i'),
          'Block'        => $this->block ? true : false
        ];

        return isset($clientsDataArray) ? array_merge($returnArray,$clientsDataArray) : $returnArray;
    }
}
