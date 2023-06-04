<?php

namespace App\Http\Controllers\ApiV2\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PackageHotelSeasonRequest;
use App\Http\Resources\Admin\PackageHotelSeasonResource;
use App\Models\PackageHotelSeason;
use Illuminate\Http\Request;

class PackageHotelSeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([ 'message' =>'success','status' => 200,
            'data'=>PackageHotelSeasonResource::collection(PackageHotelSeason::all())
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageHotelSeasonRequest $request)
    {
       if( PackageHotelSeason::create($request->validated()) )
            return response()->json(['message' =>'operation done successfully', 'status' => 200]);

        return response()->json(['message' =>'operation failed', 'status' => 400]);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PackageHotelSeason  $packageHotelSeason
     * @return \Illuminate\Http\Response
     */
    public function edit(PackageHotelSeason $packageHotelSeason)
    {
        return response()->json([ 'message' =>'success','status' => 200,
            'data'=>new PackageHotelSeasonResource( $packageHotelSeason )
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PackageHotelSeason  $packageHotelSeason
     * @return \Illuminate\Http\Response
     */
    public function update(PackageHotelSeasonRequest $request, PackageHotelSeason $packageHotelSeason)
    {
       if( $packageHotelSeason->update($request->validated()) )
            return response()->json(['message' =>'operation done successfully', 'status' => 200]);

        return response()->json(['message' =>'operation failed', 'status' => 400]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PackageHotelSeason  $packageHotelSeason
     * @return \Illuminate\Http\Response
     */
    public function destroy(PackageHotelSeason $packageHotelSeason)
    {
        if( $packageHotelSeason->delete() )
            return response()->json(['message' =>'operation done successfully', 'status' => 200]);

        return response()->json(['message' =>'operation failed', 'status' => 400]);

    }
}
