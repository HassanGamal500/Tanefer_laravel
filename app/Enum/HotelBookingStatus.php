<?php


namespace App\Enum;


class HotelBookingStatus
{
    const Cancelled = 1;
    const CancelledUser = 2;
    const Confirmed = 3;
    const Vouchered = 4;
    const Void      = 5;
    const Pending   = 6;
}
