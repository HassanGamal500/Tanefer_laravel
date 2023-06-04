<?php

namespace App\Jobs;

use App\Models\FlightSegment;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreFlightDetails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $flightSegments;
    protected $pnrId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($flightSegments,$pnrId)
    {
        $this->flightSegments = $flightSegments;
        $this->pnrId = $pnrId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->flightSegments as $item){
            if(is_array($item['originLocation'])){
                $departure_location = implode(',',$item['originLocation']);
                $arrival_location = implode(',',$item['destinationLocation']);
            }else{
                $arrival_location = implode(',',$item['destinationLocation']->toArray(\request()));
                $departure_location = implode(',',$item['originLocation']->toArray(\request()));
            }
            FlightSegment::create([
                'flight_number'      => $item['flight_number'],
                'airline'            => $item['airline'],
                'departure_location' => $departure_location,
                'departure_date'     => Carbon::createFromFormat('Y-m-d',$item['departureDate']),
                'departure_time'     => $item['departureTime'],
                'arrival_location'   => $arrival_location,
                'arrival_date'       => Carbon::createFromFormat('Y-m-d',$item['arrivalDate']),
                'arrival_time'       => $item['arrivalTime'],
                'flight_duration'    => $item['flight_duration'],
                'pnr_id'             => $this->pnrId
            ]);
        }
    }
}
