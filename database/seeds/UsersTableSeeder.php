<?php

use App\AdminSettings;
use App\Attendance;
use App\Department;
use \DateTime as DateTime;
use App\Role;
use App\User;
use App\Employee;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
        // DB::table('employees')->truncate();
        // DB::table('departments')->truncate();
        // DB::table('attendances')->truncate();
        // $employeeRole = Role::where('name', 'employee')->first();
        $adminRole =  Role::where('name', 'admin')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@app.com',
            'contact' => '01881974587',
            'password' => Hash::make('password')
        ]);

        // $employee = User::create([
        //     'name' => 'Employee 1',
        //     'email' => 'Employee@app.com',
        //     'contact' => '01881984587',
        //     'password' => Hash::make('password')
        // ]);

        // 
        // $employee->roles()->attach($employeeRole);
        // $dob = new DateTime('1997-09-15');
        // $join = new DateTime('2020-01-15');
        $admin->roles()->attach($adminRole);
        // $employee = Employee::create([
        //     'user_id' => $employee->id,
        //     'first_name' => 'Employee',
        //     'last_name' => '1',
        //     'dob' => $dob->format('Y-m-d'),
        //     'sex' => 'Male',
        //     'desg' => 'Manager',
        //     'department_id' => '1',
        //     'join_date' => $join->format('Y-m-d')
        // ]);

        $adminSettings = AdminSettings::create([
            'user_id' => $admin->id,
            'image' => "public/profile/wscg3hSMuLNovT5xwPFThHs7XYd5AQiukFPJUZdY.jpg"
        ]);

        Department::create(['name' => 'Data entry']);
        Department::create(['name' => 'Design']);
        Department::create(['name' => 'Development']);

        // Attendance seeder
        // $create = Carbon::create(2020, 8, 17, 10, 00, 23, 'Asia/Kolkata');
        // $update = Carbon::create(2020, 8, 17, 17, 00, 23, 'Asia/Kolkata');
        // for ($i=0; $i < 6; $i++) { 
        //     $attendance = Attendance::create([
        //         'employee_id' => $employee->id,
        //         'entry_ip' => '123.156.125.123',
        //         'entry_location' => 'Kanakpur: '.$i,
        //         'created_at' => $create
        //     ]);
        //     $attendance->exit_ip = '151.235.124.236';
        //     $attendance->exit_location = 'Exit location: '.$i;
        //     $attendance->registered = 'yes';
        //     $attendance->updated_at = $update;
        //     $attendance->save();
        //     $create->addDay();
        //     $update->addDay();
        // }
    }
}
