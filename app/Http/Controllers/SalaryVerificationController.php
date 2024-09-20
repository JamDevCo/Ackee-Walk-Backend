<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Support\Facades\Config;

class SalaryVerificationController extends Controller
{
    public function verify($token)
    {
        $salary = Salary::where('verification_token', $token)->first();

        if ($salary) {
            $salary->update([
                'is_verified' => true,
                'verification_token' => null,
            ]);

            $clientUrl = Config::get('app.client_url', 'http://localhost:3000');
            return redirect($clientUrl . '/verification');
        }

        $clientUrl = Config::get('app.client_url', 'http://localhost:3000');
        return redirect($clientUrl . '/verification/error');
    }
}