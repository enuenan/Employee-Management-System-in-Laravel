<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;

use App\Employee;
use App\AdminSettings;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index() {
        $employees = Employee::count();
        $admins = count(User::join('role_user', 'users.id', 'role_user.user_id')->where('role_id', 1)->get());
        return view('admin.index', compact('employees', 'admins'));
    }

    public function reset_password() {
        return view('auth.reset-password');
    }

    public function update_password(Request $request) {
        // $user = Auth::user();
        // if($user->password == Hash::make($request->old_password)) {
        //     dd($request->all());
        // } else {
        //     dd("error");
        //     $request->session()->flash('error', 'Wrong Password');
        //     return back();
        // }

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'password' => ['required', 'min:6'],
            'password_confirmation' => ['same:password', 'min:6'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password)]);
        
        $request->session()->flash('success', 'Password updated successfully');
        return back();
    }

    public function add_addmin()
    {
        return view('admin.adminCreate');
    }

    public function store_admin(Request $request)
    {
        // dd($request);
        $dataValidate = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'contact' => 'nullable|numeric|digits:11',
            'image' => 'image|nullable',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6|required_with:password|same:password',
        ]);
        
        $adminRole =  Role::where('name', 'admin')->first();

        $user = new User();
        $user->name = $request->first_name.' '.$request->last_name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->password = Hash::make($request->password);

        $save = $user->save();

        if($save){
            $user->roles()->attach($adminRole);

            $admin = User::latest()->first();

            $adminSettings = new AdminSettings();
            $adminSettings->user_id = $admin->id;
            if ($request->hasFile('image')) {
                $adminSettings->image = $request->image->store('public/profile');
            }
            $saveAdminSettings = $adminSettings->save();
        }

        $request->session()->flash('success', 'Admin Created successfully');
        return back();
    }

    public function allAdmin()
    {
        $admins = User::join('role_user', 'users.id', 'role_user.user_id')->where('role_id', 1)
        ->join('admin_settings','users.id', 'admin_settings.user_id')->get();
        // dd($admins);
        return view('admin.all_admin', compact('admins'));
    }

    public function edit_profile($id)
    {
        $user = User::find($id);
        return view('admin.edit_profile', compact('user'));
    }

    public function update_profile(Request $request, $id)
    {
        $dataValidate = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'contact' => 'required|numeric|digits:11',
            'image' => 'image'
        ]);

        $user =User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact = $request->contact;

        $user->save();
        
        if ($request->hasFile('image')) {
            $userSettings = AdminSettings::where('user_id', $id)->first();
            Storage::delete($userSettings->image);
            $userSettings->image = $request->image->store('public/profile');
            $userSettings->save();
        }

        $request->session()->flash('success', 'Updated successfully');
        return back();
    }
}
