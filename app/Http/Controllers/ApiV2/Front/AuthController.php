<?php
namespace App\Http\Controllers\ApiV2\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed.',
                'data' => $validator->errors()->first()
            ], 422);
        }

        $user = User::create([
            'username'  => $request->username,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'password'  => Hash::make($request->password),
            'type'      => 'client'
        ]);

        $token = $user->createToken('TaneferProject')->accessToken;

        return response()->json([
            'status' => true,
            'message' => 'User registered successfully.',
            'data' => ['token' => $token]
        ], 201);
    }

    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'username'  => 'required_without:email|string',
            'email'     => 'required_without:username|string|email',
            'password'  => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed.',
                'data' => $validator->errors()->first()
            ], 422);
        }

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('TaneferProject')->accessToken;
            return response()->json([
                'status' => true,
                'message' => 'Login successful.',
                'data' => ['token' => $token]
            ], 200);
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('TaneferProject')->accessToken;
            return response()->json([
                'status' => true,
                'message' => 'Login successful.',
                'data' => ['token' => $token]
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Unauthorized.',
            'data' => null
        ], 401);
    }

    ///**  check this function **///
    public function getProfile(): JsonResponse
    {
        $user = Auth::user();
        return response()->json([
            'status' => true,
            'message' => 'Profile retrieved successfully.',
            'data' => $user
        ], 200);
    }

    public function updateProfile(Request $request): JsonResponse
    {
        $user = Auth::user();
    
        $validator = Validator::make($request->all(), [
            'username'  => 'sometimes|required|string|max:255|unique:users,username,' . $user->id,
            'email'     => 'sometimes|required|string|email|max:255|unique:users,email,' . $user->id,
            'code'      => 'sometimes|required|string|max:15',
            'phone'     => 'sometimes|required|string|max:15|unique:users,phone,' . $user->id,
            'password'  => 'sometimes|required|string|min:8|confirmed',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed.',
                'data' => $validator->errors()->first()
            ], 422);
        }
    
        if ($request->has('username')) {
            $user->username = $request->username;
        }
        if ($request->has('email')) {
            $user->email = $request->email;
        }
        if ($request->has('code')) {
            $user->code = $request->code;
        }
        if ($request->has('phone')) {
            $user->phone = $request->phone;
        }
        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }
    
        $user->save();
    
        return response()->json([
            'status' => true,
            'message' => 'Profile updated successfully.',
            'data' => $user
        ], 200);
    }
    

    public function logout(Request $request): JsonResponse
    {
        $request->user()->token()->revoke();
        return response()->json([
            'status' => true,
            'message' => 'Successfully logged out.',
            'data' => null
        ], 200);
    }

    public function updatePassword(Request $request): JsonResponse
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string|min:8',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed.',
                'data' => $validator->errors()->first()
            ], 422);
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Current password is incorrect.',
                'data' => null
            ], 422);
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Password updated successfully.',
            'data' => null
        ], 200);
    }


}
