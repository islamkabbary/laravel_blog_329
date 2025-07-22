<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => "required|email",
            "password" => "required"
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return ApiResponse::error('credentials error');
        }
        
        $token = $user->createToken("api-token")->plainTextToken;
        return ApiResponse::success(['token' => $token]);
    }
}
