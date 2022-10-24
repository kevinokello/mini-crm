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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/companies', [App\Http\Controllers\CompanyController::class, 'index'])->name('companies');
    Route::get('company/add', [App\Http\Controllers\CompanyController::class, 'create'])->name('addCompany');
    Route::post('company/store', [App\Http\Controllers\CompanyController::class, 'store'])->name('storeCompany');
    Route::get('edit-company/{company_id}', [App\Http\Controllers\CompanyController::class, 'edit'])->name('editCompany');
    Route::put('update-company/{company_id}', [App\Http\Controllers\CompanyController::class, 'update'])->name('updateCompany');
    Route::get('delete-company/{company_id}', [App\Http\Controllers\CompanyController::class, 'destroy'])->name('deleteCompany');

    Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employees');
    Route::get('employee/add', [App\Http\Controllers\EmployeeController::class, 'create'])->name('addEmployee');
    Route::post('employee/store', [App\Http\Controllers\EmployeeController::class, 'store'])->name('storeEmployee');
    Route::get('edit-employee/{employee_id}', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('editEmployee');
    Route::put('update-employee/{employee_id}', [App\Http\Controllers\EmployeeController::class, 'update'])->name('updateEmployee');
    Route::get('delete-employee/{employee_id}', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('deleteEmployee');


});

