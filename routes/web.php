<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\EmployeeController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\DepartmentController;

class Auth extends Illuminate\Support\Facades\Auth {}



Route::get('/', function () {
    return redirect()->route('login');
});


Auth::routes(['register' => false]);
Route::middleware(['auth'])->group(function () {
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('users',UserController::class);
    Route::resource('countries',CountryController::class);
    Route::resource('states',StateController::class);
    Route::resource('cities', CityController::class);
    Route::resource('departments',DepartmentController::class);
    Route::get('employee', function () {
        return view('employee.index');

    });

    // Route::delete('employees/{employee}',[EmployeeController::class,'destroy']);

});
