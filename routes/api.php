<?php 

use App\Http\Controllers\SalaryController;
use App\Http\Controllers\Api\CompanyController;
use Illuminate\Support\Facades\Route;

Route::post('/salaries', [SalaryController::class, 'store']);
Route::get('/salaries', [SalaryController::class, 'index']);
Route::get('/salaries/{id}', [SalaryController::class, 'show']);
Route::get('/salary-form-data', [SalaryController::class, 'getFormData']);

Route::apiResource('companies', CompanyController::class);
