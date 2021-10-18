<?php

namespace App\Http\Middleware;

use Closure;
use App\Employee;
use Carbon\Carbon;
use App\Attendance;
use Illuminate\Support\Facades\Auth;

class EmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = Auth::user()->id;
        $employee = Employee::where('user_id', $id)->first();
        $month = Carbon::now()->month;
        $thisMonthAttendances = Attendance::whereMonth('created_at', $month)
            ->whereYear('created_at', Carbon::now()->year)
            ->where('employee_id', $employee->id)
            ->get();
        $count = 0;
        foreach ($thisMonthAttendances as $thisMonthAttendance){
            $checkInTime = strtotime('07:59:59');
            $loginTime = strtotime(date("H:i:s",strtotime($thisMonthAttendance->created_at)));
            $diff = $checkInTime - $loginTime;
            if($diff<0){
                $count++;
            }
        }
        // $count = 4;
        if($count>5){
            \View::share('lateCount', $count);
        }else{
            \View::share('lateCount', 0);
        }

        return $next($request);
    }
}
