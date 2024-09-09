<?php 

use App\Http\Controllers\SalaryController;
use Illuminate\Support\Facades\Route;

Route::post('/salaries', [SalaryController::class, 'store']);
Route::get('/salaries', [SalaryController::class, 'index']);
Route::get('/salaries/{id}', [SalaryController::class, 'show']);