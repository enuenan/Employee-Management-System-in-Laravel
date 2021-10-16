<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['auth','can:admin-access'])->group(function () {
    Route::get('/', 'AdminController@index')->name('index');
    Route::get('/edit-profile/{id}', 'AdminController@edit_profile')->name('edit_profile');
    Route::post('/update-profile/{id}', 'AdminController@update_profile')->name('update_profile');
    Route::get('/', 'AdminController@index')->name('index');
    Route::get('/reset-password', 'AdminController@reset_password')->name('reset-password');
    Route::put('/update-password', 'AdminController@update_password')->name('update-password');
    Route::get('/all-admin', 'AdminController@allAdmin')->name('allAdmin');
    Route::get('/add-admin', 'AdminController@add_addmin')->name('admin.create');
    Route::post('/add-admin', 'AdminController@store_admin')->name('admin.store');

    // Routes for employees //
    Route::get('/employees/list-employees', 'EmployeeController@index')->name('employees.index');
    Route::get('/employees/reset-password/{id}', 'EmployeeController@resetPass')->name('employees.reset_pass');
    Route::get('/employees/add-employee', 'EmployeeController@create')->name('employees.create');
    Route::post('/employees', 'EmployeeController@store')->name('employees.store');
    Route::get('/employees/edit/{id}', 'EmployeeController@edit')->name('employees.edit');
    Route::post('/employees/edit/{id}', 'EmployeeController@update')->name('employees.update');
    Route::get('/employees/attendance', 'EmployeeController@attendance')->name('employees.attendance');
    Route::post('/employees/attendance', 'EmployeeController@attendance')->name('employees.attendance');
    Route::delete('/employees/attendance/{attendance_id}', 'EmployeeController@attendanceDelete')->name('employees.attendance.delete');
    Route::get('/employees/profile/{employee_id}', 'EmployeeController@employeeProfile')->name('employees.profile');
    Route::delete('/employees/{employee_id}', 'EmployeeController@destroy')->name('employees.delete');
    Route::get('/employees/profile/{employee_id}/attendance-by-month/{month}', 'EmployeeController@getAttendanceByMonth')->name('employees.getAttendanceByMonth');
    // Routes for employees //

    // Routes for leaves //
    Route::get('/leaves/list-leaves', 'LeaveController@index')->name('leaves.index');
    Route::put('/leaves/{leave_id}', 'LeaveController@update')->name('leaves.update');
    // Routes for leaves //

    // Routes for expenses //
    Route::get('/expenses/list-expenses', 'ExpenseController@index')->name('expenses.index');
    Route::put('/expenses/{expense_id}', 'ExpenseController@update')->name('expenses.update');
    // Routes for expenses //

    // Routes for holidays //
    Route::get('/holidays/list-holidays', 'HolidayController@index')->name('holidays.index');
    Route::get('/holidays/add-holiday', 'HolidayController@create')->name('holidays.create');
    Route::post('/holidays', 'HolidayController@store')->name('holidays.store');
    Route::get('/holidays/edit-holiday/{holiday_id}', 'HolidayController@edit')->name('holidays.edit');
    Route::put('/holidays/{holiday_id}', 'HolidayController@update')->name('holidays.update');
    Route::delete('/holidays/{holiday_id}', 'HolidayController@destroy')->name('holidays.delete');
    // Routes for holidays //
});