<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{
    public function login(Request $request)
    {

        // Validate Login Data
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:5',
        ]);

        // Attempt to login


        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            // Redirect to dashboard
            $token = $user->createToken('Api Token')->plainTextToken;

            return response()->json([
                'message' => 'Login Successfull',
                'token' => $token
            ], 200);
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out'
        ];
    }
}
