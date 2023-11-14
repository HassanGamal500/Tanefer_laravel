<?php

namespace App\Http\Controllers\ApiV2\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\SeoResources;
use App\Models\MainPageSeo;

class MainSeoPagesController extends Controller
{
    public function show($id)
    {
        $row = MainPageSeo::where('id', $id)->first();
        if (!$row) {
            return response()->json(['message' => 'No Record found'], 404);
        }
        return response()->json([ 'message' =>'success','status' => 200,
            'data'=> new SeoResources( $row )
        ]);
    }
}
