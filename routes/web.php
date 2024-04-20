<?php

use App\Http\Controllers\EmployeeDetailController;
use app\Models\EmployeeDetails;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeDetailsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    'employeedetails/trash/{id}',
    [EmployeeDetailController::class, 'trash']
)->name('employeedetails.trash');
Route::get(
    'employeedetails/trashed/',
    [EmployeeDetailController::class, 'trashed']
)->name('employeedetails.trashed');
Route::get(
    'employeedetails/restore/{id}',
    [EmployeeDetailController::class, 'restore']
)->name('employeedetails.restore');
Route::resource('employeedetails', EmployeeDetailController::class);
