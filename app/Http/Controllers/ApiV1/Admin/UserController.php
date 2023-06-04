<?php

namespace App\Http\Controllers\ApiV1\Admin;

use App\Http\Requests\UpdateUserRoleRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\PaginatedCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserController extends AdminController
{
    public function index()
    {
        $validator = Validator::make(request()->all(),[
            'role' => 'exists:roles,name'
        ]);
        if($validator->fails()){
            return apiResponse(new \stdClass(),implode(',',$validator->errors()->all()),false);
        }
        if(\request()->get('role') != null){
            $users = User::role(\request()->get('role'))
                ->where('email','!=','ahmed.salim@adamtravel.net')->latest()->paginate();
        }else{
            $users = User::where('email','!=','ahmed.salim@adamtravel.net')->latest()->paginate();
        }

        return apiResponse(new PaginatedCollection($users,UserResource::class),'',
        true);
    }

    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt(Str::random()),
            'phone'    => $request->phone,
            'client_id' => $request->client_id,
            'email_verified_at' => now()
        ]);

        $user->assignRole($request->role);

        //ToDo send email to user with reset password instructions

        return apiResponse(new UserResource($user),'User Stored Successfully',true);
    }

    public function show($id)
    {
        $user = User::find($id);
        if(is_null($user)){
            return apiResponse(new \stdClass(),'User Not Found',false);
        }


        return apiResponse(new UserResource($user),'Get User Information',true);
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        if(is_null($user)){
            return apiResponse(new \stdClass(),'User Not Found',false);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => isset($request->password) && !is_null($request->password) ? bcrypt($request->password) : $user->password,
            'phone' => $request->phone,
            'client_id' => $request->client_id,
        ]);

        return apiResponse(new UserResource($user),'User Updated',true);
    }

    public function updateRole(UpdateUserRoleRequest $request,$id)
    {
        $user = User::find($id);
        if(is_null($user)){
            return apiResponse(new \stdClass(),'User Not Found',false);
        }

        if($request->action == 'delete'){
            $user->removeRole($request->role);
        }else{
            $user->assignRole($request->role);
        }

        return apiResponse(new UserResource($user),'User Role Updated',true);
    }

    public function block($id)
    {
        $user = User::find($id);
        if(is_null($user)){
            return apiResponse(new \stdClass(),'User Not Found',false);
        }

        $user->update(['block' => 1]);

        $users = User::role(['customer','subAgent'])->get();

        return apiResponse(UserResource::collection($users),$user->name.' Blocked Successfully',true);
    }

    public function unblock($id)
    {
        $user = User::find($id);
        if(is_null($user)){
            return apiResponse(new \stdClass(),'User Not Found',false);
        }
        $user->update(['block' => 0]);

        $users = User::role(['customer','subAgent'])->get();

        return apiResponse(UserResource::collection($users),$user->name.' Unblocked Successfully',true);
    }

    public function roles()
    {
        $roles = Role::select('name')->get();

        return apiResponse($roles,'',true);
    }
}
