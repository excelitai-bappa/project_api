<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class UserProfileUpdateController extends Controller
{
    public function profile_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:100',
            'user_img' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'user_phone' => 'required|numeric',
            'password' => 'required|min:5|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Profile Update Form',
                'errors' => $validator->errors(),
            ], 422);
        }

        $user_profile = User::find($id);

        $user_profile->name = $request->name;
        $user_profile->user_phone = $request->user_phone;

        if ($request->password) {
            $user_profile->password = Hash::make($request->password);
        }

        if ($request->hasFile('user_img')) {

            $destination = public_path('/upload/users_images/').$user_profile->user_img;
            
            if (file_exists($destination)) {
                unlink($destination);
            }

            $image = $request->file('user_img');
            $extension = $image->extension();
            $name = time().'.'.$extension;
            $image->move(public_path('/upload/users_images/'), $name);

            $user_profile->user_img = $name;
        }

        $user_profile->update();
        
        if ($user_profile) {
            return response()->json([
                'message' => 'Profile Updated Successfull',
                'data' =>  $user_profile,
            ], 200);
        }else{
            return response()->json([
            'message' => 'Error',
            'data' =>  $user_profile,
        ], 403);
        }
        
       
    }
}
