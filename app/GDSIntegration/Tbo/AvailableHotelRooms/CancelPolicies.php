<?php
namespace App\GDSIntegration\Tbo\AvailableHotelRooms;

use Carbon\Carbon;
use DateTime;

class CancelPolicies
{

    /**
     * @var dateTime $lastCancellationDeadLine
     * @access public
     */
    public $lastCancellationDeadLine = null;

    /**
     * @var CancelPolicy[] $policies
     * @access public
     */
    public $policies = [];

    /**
     * @var string[] $TextPolicy
     * @access public
     */
    public $TextPolicy = null;

    /**
     * @var string $defaultPolicy
     * @access public
     */
    public $defaultPolicy = null;

    /**
     * @var string $AutoCancellationText
     * @access public
     */
    public $AutoCancellationText = null;

    /**
     * @param CancelPolicy[] $CancelPolicy
     * @param string $TextPolicy
     * @param string $DefaultPolicy
     * @param string $AutoCancellationText
     * @param DateTime $lastCancellationDeadLine
     * @access public
     */
    public function __construct($CancelPolicy, $TextPolicy,$DefaultPolicy, $AutoCancellationText,$lastCancellationDeadLine)
    {
      $this->lastCancellationDeadLine = Carbon::parse($lastCancellationDeadLine)->format('Y-m-d');
      $this->policies = $CancelPolicy;
      $this->TextPolicy = $TextPolicy;
      $this->defaultPolicy = $DefaultPolicy;
      $this->AutoCancellationText = $AutoCancellationText;
    }

}
