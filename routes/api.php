<?php 


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SalaryController;


// Place the search route before the resource route
Route::get('salaries/search', [SalaryController::class, 'search']);

Route::apiResource('salaries', SalaryController::class);
// Keep this route as it's not part of the standard apiResource
Route::get('/salary-form-data', [SalaryController::class, 'getFormData']);
