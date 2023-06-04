<?php


namespace App\Services\Flights\SearchResponse;


class PassengerQuantity
{
    /**
     * @var string $Code
     * */
    public $Code;

    /**
     * @var int $Quantity
     * */
    public $Quantity;

    public function __construct($code,$Quantity)
    {
        $this->Code = $code;
        $this->Quantity = $Quantity;
    }
}
