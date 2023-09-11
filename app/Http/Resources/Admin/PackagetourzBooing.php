<?php

namespace App\Http\Resources\Admin;

use App\Models\PackageActivity;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class PackagetourzBooing extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $crui = PackageActivity::where('id', $this->adventrue_id)->first();

        return [
            'adventrue_id ' => $this->adventrue_id  ,
            'adventrue' =>  new PackageActivityResource($crui)
         ];
    }
}
