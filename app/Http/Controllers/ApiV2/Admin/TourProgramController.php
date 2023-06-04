<?php

namespace App\Http\Controllers\ApiV2\Admin;

use App\Models\TourProgram;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Tours\Admin\TourService;
use App\Http\Requests\Tours\StoreTourProgramRequest;
use App\Http\Requests\Tours\UpdateTourProgramRequest;

class TourProgramController extends Controller
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
    public function index(Request $request)
    {
        $tour_id = $request->tour_id;
        if(is_null($tour_id)){
           return response()->json(['tourPrograms' => [],'message' => "tour_id is required","errors" => []], 422);
        }

        $tourPlaces = $this->tourService->allData($tour_id,'tourPrograms');
        return response()->json(['tourPrograms'=> $tourPlaces,'message' => "Tour program Fetched Successfully","errors" => []], 200); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTourProgramRequest $request)
    {
        $tourPlaces = $this->tourService->addProgram($request->all());
        return response()->json(['tourProgram'=> $tourPlaces,'message' => "tour program is inserted Successfully","errors" => []], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTourProgramRequest $request, $id)
    {
        $tourProgram = $this->tourService->updateData($request->all(),$id,TourProgram::class);
        return response()->json(['tourProgram'=> $tourProgram,'message' => "tour program is updated Successfully","errors" => []], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tourProgram = $this->tourService->deleteData($id,TourProgram::class);
        return response()->json(['tourProgram'=> [],'message' => "Data is deleted Successfully","errors" => []], 200);
    }
}
