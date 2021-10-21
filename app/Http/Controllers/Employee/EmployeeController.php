<?php

namespace App\Http\Controllers\Employee;

use App\User;
use App\Employee;
use App\Department;
use App\Admin\Designation;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Stevebauman\Location\Facades\Location;
use Intervention\Image\ImageManagerStatic as Image;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        // if ($position = Location::get('103.218.24.227')) {
        //     // Successfully retrieved position.
        //     dd($position);
        // } else {
        //     // Failed retrieving position.
        // }
        $data = [
            'employee' => Auth::user()->employee
        ];
        return view('employee.index')->with($data);
    }

    public function profile()
    {
        $data = [
            'employee' => Auth::user()->employee
        ];
        return view('employee.profile')->with($data);
    }

    public function profile_edit($employee_id)
    {
        $data = [
            'employee' => Employee::findOrFail($employee_id),
            'departments' => Department::all(),
            'desgs' => Designation::all()
        ];
        Gate::authorize('employee-profile-access', intval($employee_id));
        return view('employee.profile-edit')->with($data);
    }

    public function profile_update(Request $request, $employee_id)
    {
        Gate::authorize('employee-profile-access', intval($employee_id));
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'photo' => 'image|nullable'
        ]);
        $employee = Employee::findOrFail($employee_id);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->dob = $request->dob;
        $employee->sex = $request->gender;
        $employee->join_date = $request->join_date;
        $employee->desg = $request->desg;
        $employee->department_id = $request->department_id;
        if ($request->hasFile('image')) {
            Storage::delete($employee->image);
            $employee->image = $request->image->store('public/profile');
        }
        $employee->save();
        $request->session()->flash('success', 'Your profile has been successfully updated!');
        return redirect()->route('employee.profile');
    }

    public function reset_password()
    {
        return view('auth.reset-password');
    }

    public function update_password(Request $request)
    {
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

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->password)]);

        $request->session()->flash('success', 'Password updated successfully');
        return back();
    }
}
