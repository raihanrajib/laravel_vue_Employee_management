<?php

use App\Http\Controllers\api\EmployeeController;
use App\Http\Controllers\api\EmployeeDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::middleware('auth:sanctum')->group(function(){
    // Route::get('employees/get-countries',[EmployeeDataController::class, 'countries']);
    // Route::get('employees/{country}/get-states',[EmployeeDataController::class, 'states']);
    // Route::get('employees/{state}/get-cities',[EmployeeDataController::class, 'cities']);
    // Route::get('employees/get-departments',[EmployeeDataController::class, 'departments']);
    // Route::post('employees/store',[EmployeeController::class,'store']);
// });

Route::get('employees',[EmployeeDataController::class,'employees']);
Route::get('employees/departments',[EmployeeDataController::class, 'departments']);
Route::get('employees/countries',[EmployeeDataController::class, 'countries']);
Route::get('employees/{country}/states',[EmployeeDataController::class, 'states']);
Route::get('employees/{state}/cities',[EmployeeDataController::class, 'cities']);
Route::get('employees/get-departments',[EmployeeDataController::class, 'departments']);
Route::post('employees/store',[EmployeeController::class,'store']);

Route::apiResource('employees', EmployeeController::class);

