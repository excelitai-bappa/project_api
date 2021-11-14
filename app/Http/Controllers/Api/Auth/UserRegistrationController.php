<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserRegistrationController extends Controller
{
    public function registration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:100',
            'email' => 'required|email|unique:users',
            'user_img' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'user_phone' => 'required|numeric',
            'password' => 'required|min:5|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Registration Form',
                'errors' => $validator->errors(),
            ], 422);
        }

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_phone = $request->user_phone;
        $user->password = Hash::make($request->password);

        if ($request->hasFile('user_img')) {

            $image = $request->file('user_img');
            $extension = $image->extension();
            $name = time().'.'.$extension;
            $image->move(public_path('/upload/users_images/'), $name);

            $user->user_img = $name;
        }

        $user->save();
        
        
        return response()->json([
            'message' => 'Registration Successfull',
            'data' =>  $user,
        ], 200);
    }
    
}
