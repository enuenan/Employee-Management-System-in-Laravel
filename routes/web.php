<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});



Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
