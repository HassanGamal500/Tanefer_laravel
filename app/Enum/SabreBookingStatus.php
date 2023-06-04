<?php


namespace App\Enum;


class SabreBookingStatus
{
    const CANCELLED = 1;
    const CONFIRMED = 2;
    const CreditCARDDECLINED =  3;
    const EPay = 4;
    const ETicketed = 5;
    const EvenTEXCHANGE = 6;
    const EXCHANGE = 7;
    const EXPIRED = 8;
    const FRAUD = 9;
    const FullREFUND = 10;
    const HELD = 11;
    const InPROGRESS = 12;
    const INITIAL = 13;
    const InvoluntaryFullRefund = 14;
    const InvoluntaryPartialRefund  = 15;
    const PaperTicketed = 16;
    const PartialExchange = 17;
    const PartialRefund = 18;
    const PendingConfirmation = 19;
    const ShuttleBook = 20;
    const Test = 21;
    const TramsProcessed = 22;
    const Void = 23;
}
