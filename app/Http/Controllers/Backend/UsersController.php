<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation Data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'user_phone' => 'min:11|max:15|numeric',
            'user_img' => 'image|mimes:jpeg,png,jpg,gif',
            'password' => 'required|min:5|confirmed',
        ]);

        // Create New User
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_phone = $request->user_phone;
        $user->user_address = $request->user_address;
        $user->password = Hash::make($request->password);

        if ($request->hasFile('user_img')) {
            $image = $request->file('user_img');
            $extension = $image->extension();
            $name = time().'.'.$extension;
            $image->move(public_path('/upload/user_images/'), $name);

            $user->user_img = $name;
        }

        $user->save();

        session()->flash('success', 'User has been created !!');
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.pages.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users,email,' . $id,
            'user_img' => 'image|mimes:jpeg,png,jpg,gif',
            'password' => 'nullable|min:6|confirmed',
        ]);


        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_phone = $request->user_phone;
        $user->user_address = $request->user_address;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('user_img')) {

            $destination = public_path('upload/user_images/') . $user->user_img;
            if (file_exists($destination)) {
                unlink($destination);
            }

            $image = $request->file('user_img');
            $extension = $image->extension();
            $name = time().'.'.$extension;
            $image->move(public_path('/upload/user_images/'), $name);

            $user->user_img = $name;
        }

        $user->update();

        session()->flash('success', 'User has been updated !!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!is_null($user)) {
            $user->delete();
        }

        session()->flash('success', 'User has been deleted !!');
        return back();
    }
}
