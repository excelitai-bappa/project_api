<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request){

        // Validate Login Data
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:5',
        ]);

        // Attempt to login


        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $admin = Admin::where('email', $request->email)->first();
            if ($admin && Hash::check($request->password, $admin->password)) {

                // Redirect to dashboard
                $token = $admin->createToken('Api Token')->plainTextToken;

                return response()->json([
                    'message' => 'Login Successfull',
                    'token' => $token
                ], 200);
            }
        } else {
            $admin = Admin::where('username', $request->email)->first();
            if ($admin && Hash::check($request->password, $admin->password)) {

                // Redirect to dashboard\]
                $token = $admin->createToken('Api Token')->plainTextToken;

                return response()->json([
                    'message' => 'Login Successfull',
                    'token' => $token
                ], 200);
            }
            return response()->json([
                'error' => 'Invalid Credentials',
            ], 422);
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
