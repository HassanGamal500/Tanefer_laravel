<?php

namespace App\Http\Controllers\ApiV2\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class ClientController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'success',
            'status' => 200,
            'data' => User::whereType('client')->latest()->get()
        ]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if(is_null($user)){
            abort(404);
        }
        // $user->delete();
        if($user->delete()) {
            return response()->json(['message' =>'operation done successfully', 'status' => 200]);
        }
        return response()->json(['message' =>'operation failed', 'status' => 400]);
    }
}
