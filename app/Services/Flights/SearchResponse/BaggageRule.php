<?php


namespace App\Services\Flights\SearchResponse;


class BaggageRule
{
    /**
     * @var string $airlineName
     *
     * @access public
     * */
    public $airlineName;

    /**
     * @var string $baggage_url
     *
     * @access public
     * */
    public $baggage_url;


    public function __construct($airlineName = '',$baggage_url = '')
    {
        $this->airlineName = $airlineName;
        $this->baggage_url = $baggage_url;
    }
}
