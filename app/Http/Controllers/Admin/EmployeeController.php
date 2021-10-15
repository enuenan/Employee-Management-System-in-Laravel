<?php

namespace App\Http\Controllers\Admin;

use App\Attendance;
use App\Department;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

use function Ramsey\Uuid\v1;

class EmployeeController extends Controller
{
    public function index() {
        // $data = [
        //     'employees' => Employee::all()
        // ];
        $employees = Employee::all();
        return view('admin.employees.index', compact('employees'));
    }

    public function create() {
        $data = [
            'departments' => Department::all(),
            'desgs' => ['Data entry executive', 'Data entry team lead', '3d artist', 'Web Developer']
        ];
        return view('admin.employees.create')->with($data);
    }

    public function edit($id)
    {
        $departments = Department::all();
        $desgs = ['Data entry executive', 'Data entry team lead', '3d artist', 'Web Developer'];

        $employee = Employee::findOrFail($id);
        $user = User::findOrFail($employee->user_id);
        return view('admin.employees.edit', compact('departments', 'desgs', 'user', 'employee'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'sex' => 'required',
            'desg' => 'required',
            'department_id' => 'required',
            'email' => 'required|email|unique:users',
            'contact' => 'nullable|numeric|digits:11',
            'photo' => 'image|nullable',
            'password' => 'required|confirmed|min:6'
        ]);
        
        $user = new User();
        $user->name = $request->first_name.' '.$request->last_name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->password = Hash::make($request->password);
        $userSave = $user->save();

        if($userSave){
            $employeeRole = Role::where('name', 'employee')->first();
    
            $user->roles()->attach($employeeRole);
    
            $employeeDetails = new Employee();
            $employeeDetails->user_id = $user->id; 
            $employeeDetails->first_name = $request->first_name; 
            $employeeDetails->last_name = $request->last_name;
            $employeeDetails->sex = $request->sex; 
            $employeeDetails->dob = $request->dob; 
            $employeeDetails->join_date = $request->join_date;
            $employeeDetails->desg = $request->desg; 
            $employeeDetails->department_id = $request->department_id; 
            // image upload
            if ($request->hasFile('image')) {
                $employeeDetails->image = $request->image->store('public/profile/');
            }
            
            $save=$employeeDetails->save();
            if($save){
                $request->session()->flash('success', 'Employee has been successfully added');
                return back();
            }
        }

    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'sex' => 'required',
            'desg' => 'required',
            'department_id' => 'required',
            'email' => 'required|email',
            'contact' => 'nullable|numeric|digits:11',
            'photo' => 'image|nullable',
        ]);
        
        $employee = Employee::findOrFail($id);
        $user = User::findOrFail($employee->user_id);

        $user->name = $request->first_name.' '.$request->last_name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->password = Hash::make($request->password);
        $userSave = $user->save();

        if($userSave){
            $employee->user_id = $user->id; 
            $employee->first_name = $request->first_name; 
            $employee->last_name = $request->last_name;
            $employee->sex = $request->sex; 
            $employee->dob = $request->dob; 
            $employee->join_date = $request->join_date;
            $employee->desg = $request->desg; 
            $employee->department_id = $request->department_id; 
            // image upload
            if ($request->hasFile('image')) {
                $employee->image = $request->image->store('public/profile/');
            }
            
            $save=$employee->save();
            if($save){
                $request->session()->flash('success', 'Employee has been successfully updated');
                return back();
            }
        }

    }

    public function attendance(Request $request) {
        $data = [
            'date' => null
        ];
        if($request->all()) {
            $date = Carbon::create($request->date);
            $employees = $this->attendanceByDate($date);
            $data['date'] = $date->format('d M, Y');
        } else {
            $employees = $this->attendanceByDate(Carbon::now());
        }
        $data['employees'] = $employees;
        // dd($employees->get(4)->attendanceToday->id);
        return view('admin.employees.attendance')->with($data);
    }

    public function attendanceByDate($date) {
        $employees = DB::table('employees')->select('id', 'first_name', 'last_name', 'desg', 'department_id')->get();
        $attendances = Attendance::all()->filter(function($attendance, $key) use ($date){
            return $attendance->created_at->dayOfYear == $date->dayOfYear;
        });
        return $employees->map(function($employee, $key) use($attendances) {
            $attendance = $attendances->where('employee_id', $employee->id)->first();
            $employee->attendanceToday = $attendance;
            $employee->department = Department::find($employee->department_id)->name;
            return $employee;
        });
    }

    public function destroy($employee_id) {
        $employee = Employee::findOrFail($employee_id);
        $user = User::findOrFail($employee->user_id);
        // detaches all the roles
        DB::table('leaves')->where('employee_id', '=', $employee_id)->delete();
        DB::table('attendances')->where('employee_id', '=', $employee_id)->delete();
        DB::table('expenses')->where('employee_id', '=', $employee_id)->delete();
        $employee->delete();
        $user->roles()->detach();
        // deletes the users
        $user->delete();
        request()->session()->flash('success', 'Employee record has been successfully deleted');
        return back();
    }

    public function attendanceDelete($attendance_id) {
        $attendance = Attendance::findOrFail($attendance_id);
        $attendance->delete();
        request()->session()->flash('success', 'Attendance record has been successfully deleted!');
        return back();
    }

    public function employeeProfile($employee_id) {
        $employee = Employee::findOrFail($employee_id);
        return view('admin.employees.profile')->with('employee', $employee);
    }

    public function resetPass($id)
    {
        $employee = Employee::findOrFail($id);
        $user = User::findOrFail($employee->user_id);
        $user->password = Hash::make(71234567);
        $user->save();
        return back();
    }
}