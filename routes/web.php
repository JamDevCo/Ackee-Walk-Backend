<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalaryVerificationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/verify-salary/{token}', [SalaryVerificationController::class, 'verify'])->name('verify.salary');
