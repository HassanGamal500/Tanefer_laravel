<?php

namespace App\Http\Controllers\ApiV1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ActivityLogResource;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index()
    {
        if(count(\request()->all()) == 0){
            $activityLogs = ActivityLog::latest()->get();
        }

        if(! is_null(\request()->user_id)){
            $activityLogs = ActivityLog::where('user_id',\request()->user_id)->latest()->get();
        }

        return apiResponse(ActivityLogResource::collection($activityLogs),'',true);
    }


    public function admins()
    {
        $adminUsers = User::select('id','name')->role('admin')->get();

        return apiResponse($adminUsers,'',true);
    }
}
