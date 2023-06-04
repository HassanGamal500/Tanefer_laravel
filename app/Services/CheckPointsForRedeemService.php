<?php


namespace App\Services;


use App\Models\LoyaltyProgramSetting;

class CheckPointsForRedeemService
{

    //TODO Convert to custom validation rule
    public static function checkUserPointsLessThanMin($authUser)
    {
        $minPoints = LoyaltyProgramSetting::where('type','min-to-redeem')->first()->number;
        $userPoints = $authUser->available_points;

       return ($userPoints < $minPoints);
    }

    public static function checkUserPointsNotAvailableToRedeem($paymentAmount,$authUser)
    {
        $pointsPerUnitPrice = LoyaltyProgramSetting::where('type','redeem-points-per-price')->first()->number;

        $userPoints = $authUser->available_points;

        $userAvalAmount = $userPoints / $pointsPerUnitPrice;

        return (floor($userAvalAmount) < floor($paymentAmount));
    }


}
