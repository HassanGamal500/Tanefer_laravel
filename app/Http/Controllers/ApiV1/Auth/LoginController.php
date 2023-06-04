<?php

namespace App\Http\Controllers\ApiV1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\JWT;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login2(Request $request)
    {
        $client = resolve('client');


        $request->request->add([
            'grant_type' => 'password',
            'client_id'  => config('app.app_id'),
            'client_secret'=> config('app.app_secret'),
            'username'  => $request->email,
            'password' => $request->password,
            'scope'   => null
        ]);



        $user = User::where('email',$request->email)->where('client_id',$client->id)->first();

        if(is_null($user)){
            return apiResponse([],'Wrong Email or Password',false);
        }

        if(! is_null($user)){
            if(! preg_match('/^\$2y\$/',$user->password)) {
                return apiResponse([], 'please reset your password by clicking on (Forgot your password?)', false);
            }
        }

        $token = Request::create(
            'oauth/token','post'
        );

        $response = Route::dispatch($token);

        if(array_key_exists('error',json_decode($response->content(),true))){
            if(json_decode($response->content(),true)['error'] == 'invalid_grant' || json_decode($response->content(),true)['error'] == 'invalid_request'){
                return apiResponse([],'Wrong Email or Password',false);
            }
            elseif (json_decode($response->content(),true)['error'] == 'invalid_client'){
                return apiResponse([],'Invalid client',false);
            }
        }

        $user = User::where('email',$request->email)->first();

        if($client->name == 'Back Office'){
            if(! $user->hasRole('admin')){
                return apiResponse([],'You didn\'t have permission to login',false);
            }
        }

        if($client->name == 'atsfares'){
            $userRoles = $user->roles()->where('name','LIKE','ats_%')->get();
            if(count($userRoles) == 0){
                return apiResponse([],'You didn\'t have permission to login',false);
            }
        }

        if($user->block == 1){
            return apiResponse([],'This Account Not activated by admin or blocked',false);
        }

        if($request->device_token != null){
            $user->device_token = $request->device_token;
            $user->update();
        }

        if(is_null($user->email_verified_at)){
            return apiResponse([],'Please Verify Email',304);
        }


        return apiResponse([
            'token' => json_decode($response->content()),
            'user'  => new UserResource($user,\request('host'))
        ],'User LoggedIn Successfully',true);
    }

    public function login()
    {
        // dd(request()->all());
        //$client = resolve('client');
        //$mainClient = $client->parentClient ?? $client;
        $mainClient = $client = Client::find(6);


        $credentials = [
            'email' => \request()->post('email'),
            'password' => \request()->post('password'),
            'client_id' => $mainClient->id ?? null
        ];

        // $token = auth()->guard('api')->attempt($credentials);
        // dd(auth()->guard('api')->user());

        if(! $token = auth()->guard('api')->attempt($credentials)){
            return apiResponse(new \stdClass(),'Wrong Email or Password',false);
        }

        $user = User::where('email',\request()->post('email'))->where('client_id',$mainClient->id ?? null)->first();

        if(\request()->role == 'admin'){
            if(! $user->hasRole('admin')){
                return apiResponse([],'You didn\'t have permission to login',false);
            }
        }

        $name = $client->name ?? null;
        if($name == 'atsfares'){
            $userRoles = $user->roles()->where('name','LIKE','ats_%')->get();
            if(count($userRoles) == 0){
                return apiResponse([],'You didn\'t have permission to login',false);
            }
        }

        if($user->block == 1){
            return apiResponse([],'This Account Not activated by admin or blocked',false);
        }

        if(\request('device_token') != null){
            $user->device_token = \request('device_token');
            $user->update();
        }

        if(is_null($user->email_verified_at)){
            return apiResponse([],'Please Verify Email',304);
        }

        return $this->respondWithToken($token);
    }

    public function logout()
    {
        \auth()->guard('api')->user()->update(['device_token' => null]);
        auth()->guard('api')->logout();

        return apiResponse(new \stdClass(),'Successfully logged out',true);
    }

    protected function respondWithToken($token)
    {
        return apiResponse([
            'token' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => \auth('api')->factory()->getTTL()
            ],
            'user' => new UserResource(\auth()->guard('api')->user(),\request('host'))
        ],'User LoggedIn Successfully',true);
    }
}
