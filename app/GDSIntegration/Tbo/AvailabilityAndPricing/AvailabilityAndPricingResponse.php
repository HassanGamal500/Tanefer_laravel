<?php
namespace App\GDSIntegration\Tbo\AvailabilityAndPricing;


use App\GDSIntegration\Tbo\AvailableHotelRooms\CancelPolicy;
use App\GDSIntegration\Tbo\ResponseStatus;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class AvailabilityAndPricingResponse
{

    /**
     * @var boolean $AvailableForBook
     * @access public
     */
    public $AvailableForBook = null;

    /**
     * @var boolean $AvailableForConfirmBook
     * @access public
     */
    public $AvailableForConfirmBook = null;

    /**
     * @var boolean $CancellationPoliciesAvailable
     * @access public
     */
    public $CancellationPoliciesAvailable = null;

    /**
     * @var string $priceVerification
     * @access public
     */
    public $priceVerification = '';

    /**
     * @var bool $priceChanged
     * @access
     */
    public $priceChanged = false;

    /**
     * @var \DateTime $lastCancellationDeadLine
     * @access public
     */
    public $lastCancellationDeadLine = '';

    /**
     * @var string $DefaultPolicy
     * @access public
     */
    public $DefaultPolicy = '';

    /**
     * @var String[] $HotelPolicies
     * @access public
     */
    public $HotelPolicies = [];

    /**
     * @var CancelPolicy[] $cancelPolicies
     * @access public
     */
    public $cancelPolicies = null;

    /**
     * @var boolean $IsFlightDetailsMandatory
     * @access public
     */
    public $IsFlightDetailsMandatory = null;

    /**
     * @var Hotel_Room[] $rooms
     * @access public
     */
    public $rooms = [];

    /**
     * @var string $AutoCancellationText
     * @access
     */
    public $AutoCancellationText = '';

    /**
     * @param int $ResultIndex
     * @param boolean $AvailableForBook
     * @param boolean $AvailableForConfirmBook
     * @param boolean $CancellationPoliciesAvailable
     * @param String[] $HotelNorms
     * @param CancelPolicy[] $CancelPolicies
     * @param boolean $IsFlightDetailsMandatory
     * @param Hotel_Room[] $HotelRooms
     * @access public
     */
    public function __construct($AvailableForBook, $AvailableForConfirmBook,
                                $CancellationPoliciesAvailable, $cancelPolicies,$priceVerification,$priceChanged,
                                $lastCancellationDeadLine, $hotelNorms,
                                 $IsFlightDetailsMandatory, $HotelRooms,$defaultPolicy,$AutoCancellationText)
    {
      $this->AvailableForBook = $AvailableForBook;
      $this->AvailableForConfirmBook = $AvailableForConfirmBook;
      $this->CancellationPoliciesAvailable = $CancellationPoliciesAvailable;
      $this->priceVerification = $priceVerification;
      $this->priceChanged = $priceChanged;
      $this->cancelPolicies = $cancelPolicies;
      $this->lastCancellationDeadLine = Carbon::parse($lastCancellationDeadLine)->format('Y-m-d');
      $this->DefaultPolicy = $defaultPolicy;
      $this->HotelPolicies = $this->filterEmptyValue($hotelNorms);
      $this->IsFlightDetailsMandatory = $IsFlightDetailsMandatory;
      $this->rooms = $HotelRooms;
      $this->AutoCancellationText = $AutoCancellationText;
    }

    public function filterEmptyValue($hotelNorms)
    {
        $policies = [];

        if(is_array($hotelNorms)){
            $policies = Arr::where($hotelNorms,function ($value){
                return strlen($value) > 0;
            });
        }

        return $policies;
    }

}
