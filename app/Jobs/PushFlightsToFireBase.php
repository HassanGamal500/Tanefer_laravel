<?php

namespace App\Jobs;

use App\GDSIntegration\Sabre\BargainFinderMax;
use App\Libs\FireBase\RealTimeNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

class PushFlightsToFireBase implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $requestData;
    protected $excludeAirlines;
    protected $promotion;
    protected $search_id;
    protected $requestType;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($requestData,$excludeAirlines,$promotion,$search_id,$requestType = null)
    {
        $this->requestData = $requestData;
        $this->excludeAirlines = $excludeAirlines;
        $this->promotion = $promotion;
        $this->search_id = $search_id;
        $this->requestType = $requestType;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $realTimeDatabase = new RealTimeNotification();

        if($this->requestType == 'alternateDates'){
            $this->requestData['search_id'] = $this->search_id;
        }elseif ($this->requestType == 'netFares'){
            $this->requestData['search_id'] = $this->search_id;
            $this->requestData['withFares'] = '1';
        }

        $bargainFinderMax = new BargainFinderMax();

        $flights = $bargainFinderMax->searchResultBySoap($this->requestData,$this->excludeAirlines,$this->promotion, $this->search_id);

        $flights = is_string($flights) ? [] : $flights;

        if(Cache::has('countFlights-'.$this->search_id)){
            $countFlights = Cache::get('countFlights-'.$this->search_id);

            if($countFlights != 0){
                $newCountFlights = $countFlights - 1;
            }else{
                $newCountFlights = 0;
            }

            Cache::put('countFlights-'.$this->search_id,$newCountFlights,1200);
            $realTimeDatabase->pushFlights($newCountFlights,$this->search_id,'countFlights-'.$this->search_id);

        }else{
            Cache::put('countFlights-'.$this->search_id,2,1200);
            $realTimeDatabase->pushFlights(2,$this->search_id,'countFlights-'.$this->search_id);
        }


        $realTimeDatabase->pushFlights($flights,$this->search_id);
    }
}
