<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
;
Route::get('/', App\Http\Livewire\Login::class)->name("login");


       
Route::group(['middleware'=>['auth','SuperAdmin']],function(){

        Route::get('admin', App\Http\Livewire\Admin::class)->name("admin");
        Route::get('request-paid-leave', App\Http\Livewire\RequestPaidLeave::class)->name("paid_leave");
    });

Route::group(['middleware'=>['auth','Employee']],function(){

    Route::get('employee', App\Http\Livewire\Employee::class)->name("employee");
});

Route::get('employee', App\Http\Livewire\Employee::class)->name("employee");

Route::group(['middleware' => 'Admin' ], function(){

    Route::get('admin', App\Http\Livewire\Admin::class)->name("admin");
    Route::get('request-paid-leave', App\Http\Livewire\RequestPaidLeave::class)->name("paid_leave");
});