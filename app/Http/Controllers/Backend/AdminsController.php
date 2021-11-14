<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class AdminsController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('admin.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }

        $admins = Admin::all();
        return view('backend.pages.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }

        $roles  = Role::all();
        return view('backend.pages.admins.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }

        // Validation Data
        $request->validate([
            'name' => 'required',
            'username' => 'required|max:15|min:5',
            'email' => 'required|email|unique:admins',
            'phone' => 'required|numeric',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif',
            'password' => 'required|min:5|confirmed',
        ]);

        // Create New Admin
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->username = $request->username;
        $admin->address = $request->address;
        $admin->password = Hash::make($request->password);



        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $extension = $image->extension();
            $name = time().'.'.$extension;
            $image->move(public_path('/upload/admin_images/'), $name);

            $admin->img = $name;
        }

        $admin->save();


        if ($request->roles) {
            $admin->assignRole($request->roles);
        }

        session()->flash('success', 'Admin has been created !!');
        return redirect()->route('admin.admins.index');
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
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }

        $admin = Admin::find($id);
        $roles  = Role::all();
        return view('backend.pages.admins.edit', compact('admin', 'roles'));
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
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }

        $admin = Admin::find($id);

        // Validation Data
        $request->validate([
            'name' => 'required',
            'email' => 'required|max:100|email|unique:admins,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
            'img' => 'image|mimes:jpeg,png,jpg,gif',
            'phone' => 'required|numeric',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;

        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }


        if ($request->hasFile('img')) {

            $destination = public_path('upload/admin_images/') . $admin->img;
            if (file_exists($destination)) {
                unlink($destination);
            }

            $image = $request->file('img');
            $extension = $image->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $image->move(public_path('upload/admin_images/'), $fileName);
            $admin->img =  $fileName;
        }

        $admin->update();

        $admin->roles()->detach();
        if ($request->roles) {
            $admin->assignRole($request->roles);
        }

        session()->flash('success', 'Admin has been updated !!');
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
        if (is_null($this->user) || !$this->user->can('admin.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any admin !');
        }

        $admin = Admin::find($id);
        if (!is_null($admin)) {
            $admin->delete();
        }

        session()->flash('success', 'Admin has been deleted !!');
        return back();
    }
}
