<?php

namespace App\Http\Controllers\ApiV1\Admin;

use App\Http\Requests\EmailSettingRequest;
use App\Http\Requests\LoyaltyProgramRequest;
use App\Http\Requests\ThirdPartyAccountRequest;
use App\Http\Resources\ThirdPartyAccountResource;
use App\Models\EmailSetting;
use App\Models\LoyaltyProgramSetting;
use App\Models\ProfitSetting;
use App\Models\ThirdPartyAccount;
use Illuminate\Http\JsonResponse;

class SettingsController extends AdminController
{
    public function loyaltyProgram()
    {
        $loyaltyProgramSettings = LoyaltyProgramSetting::all();

        return apiResponse($loyaltyProgramSettings,'List settings',true);
    }

    public function updateLoyaltyProgram(LoyaltyProgramRequest $request, $id)
    {
        $loyaltyProgramSetting = LoyaltyProgramSetting::find($id);
        if(is_null($loyaltyProgramSetting)){
            $loyaltyProgramSetting = new LoyaltyProgramSetting();
        }
        $loyaltyProgramSetting->name = $request->name;
        $loyaltyProgramSetting->type = $request->type;
        $loyaltyProgramSetting->number = $request->number;
        $loyaltyProgramSetting->price  = $request->price;
        $loyaltyProgramSetting->currency = $request->currency;
        $loyaltyProgramSetting->remarks  = $request->remarks;
        $loyaltyProgramSetting->save();

        return apiResponse('','Updated Successfully',true);
    }

    public function thirdPartyAccounts()
    {
        $thirdPartyAccounts = ThirdPartyAccount::all();

        return apiResponse(ThirdPartyAccountResource::collection($thirdPartyAccounts),'all accounts',true);
    }

    public function updateThirdPartyAccount(ThirdPartyAccountRequest $request, $id)
    {
        $thirdPartyAccount = ThirdPartyAccount::find($id);
        if(is_null($thirdPartyAccount)){
            return apiResponse('','This account not found',false);
        }
        $thirdPartyAccount->update([
            'username' => $request->username ?? $thirdPartyAccount->username,
            'password' => is_null($request->password) ? $thirdPartyAccount->password: encrypt($request->password),
            'additional_attr' => $request->additional_attr,
        ]);

        return apiResponse('','Account Updated',true);

    }


    /**
     * Display Profits values of different categories for admins
     *
     * @return JsonResponse
     * */
    public function profitSettings()
    {
        $profitSettings = ProfitSetting::all();

        return apiResponse($profitSettings,'Get All Profit Settings',true);
    }

    /**
     * Update Profit Value for specific category by id from admin only
     *
     * @param integer $id
     *
     * @return JsonResponse
     */
    public function updateProfitSettings($id)
    {
        $profitSetting = ProfitSetting::find($id);

        if(is_null($profitSetting)){
            return apiResponse('','This Setting not found',false);
        }

        $profitSetting->update([
            'amount' => \request()->amount,
            'description' => is_null(\request()->description)? '':\request()->description
        ]);

        return apiResponse('','Profit Setting Updated',true);
    }

    public function emailSetting()
    {
        $emailSettings = EmailSetting::all();

        return apiResponse($emailSettings,'',true);
    }

    public function updateEmailSettings(EmailSettingRequest $request, $id)
    {
        if($id == 0){
            $emailSetting = EmailSetting::create([
                'to' => $request->to,
                'cc' => $request->cc,
                'client_id' => $request->client_id
            ]);
        }else{
            $emailSetting = EmailSetting::find($id);
            if(is_null($emailSetting)){
                return apiResponse(new \stdClass(),'Email Setting not found',false);
            }
            $cc = ($request->cc == null || $request->cc == "") ? $emailSetting->cc : $request->cc;
            $emailSetting->update([
                'to' => $request->to,
                'cc' => $cc,
                'client_id' => $request->client_id
            ]);
        }

        return apiResponse($emailSetting,'Email Setting Updated',true);
    }
}
