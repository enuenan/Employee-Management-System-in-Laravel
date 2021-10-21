<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Leave;
use App\Employee;
use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\EmployeeLeaveStatusNotification;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::all();
        $leaves = $leaves->map(function ($leave, $key) {
            $employee = Employee::find($leave->employee_id);
            $employee->department = Department::find($employee->department_id)->name;
            $leave->employee = $employee;
            return $leave;
        });
        return view('admin.leaves.index')->with('leaves', $leaves);
    }

    public function update(Request $request, $leave_id)
    {
        $this->validate($request, [
            'status' => 'required'
        ]);
        $leave = Leave::find($leave_id);
        $leave->status = $request->status;
        $leave->save();

        $lastLeaveStatus = Leave::orderBy('updated_at', 'DESC')->first();
        $employee = Employee::find($leave->employee_id);
        $user = User::find($employee->user_id);
        $user->notify(new EmployeeLeaveStatusNotification($lastLeaveStatus));

        $request->session()->flash('success', 'Leave status has been successfully updated');
        return back();
    }

    public function delete($leave_id)
    {
        $leave = Leave::find($leave_id);
        $leave->delete();
        session()->flash('success', 'Leave status has been successfully deleted');

        return back();
    }
}
