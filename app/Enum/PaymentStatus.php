<?php


namespace App\Enum;


class PaymentStatus
{
    const Hold = 1;
    const Done = 2;
    const Released = 3;
    const PartiallyRefund = 4;
    const TotallyRefund = 5;
}
