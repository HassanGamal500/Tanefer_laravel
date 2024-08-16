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
            'data' => User::select('id', 'username', 'email', 'phone')->whereType('client')->latest()->get()
        ]);
    }
}
