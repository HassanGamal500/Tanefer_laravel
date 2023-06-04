<?php

namespace App\Http\Controllers\ApiV2\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Tour\TourResource;
use App\Services\Tours\Admin\TourService;
use App\Http\Requests\Tours\StoreTourRequest;
use App\Http\Requests\Tours\UpdateTourRequest;
use App\Http\Resources\Tour\TourDetailsResource;

class TourController extends Controller
{
    private $tourService;

    public function __construct(TourService $tourService)
    {
        $this->tourService = $tourService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = $this->tourService->all();
        return response()->json(['tours' => TourResource::collection($tours),'message' => 'Tours Fetched Successfully',"errors" => []] ,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTourRequest $request)
    {
        $tour = $this->tourService->create($request);

        return response()->json(['tour'=> new TourResource($tour),'message' => "tour is inserted Successfully","errors" => []], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tour = $this->tourService->find($id);
        if(empty($tour)){
            return response()->json(['tour'=> [],'message' => "tour not found","errors" => []] ,404);
        }else{
            return response()->json(['tour'=> new TourDetailsResource($tour),'message' => "tour Fetched Successfully","errors" => []] ,200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTourRequest $request, $id)
    {
        $tour = $this->tourService->update($request,$id);

        if(!$tour){
            return response()->json(['tour'=> [],'message' => "tour not found","errors" => []] ,404);
        }else{
            $tour = $this->tourService->find($id);
            return response()->json(['tour'=> new TourResource($tour),'message' => "tour is updated Successfully","errors" => []], 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tour = $this->tourService->delete($id);
        if(!$tour){
            return response()->json(['tour'=> [],'message' => "tour not found","errors" => []] ,404);
        }else{

            return response()->json(['tour'=> [],'message' => "tour is deleted Successfully","errors" => []], 200);
        }
    }
}
