<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SalaryController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'location_id' => 'required|exists:locations,id',
            'company_id' => 'required|exists:companies,id',
            'industry_id' => 'required|exists:industries,id',
            'experience_id' => 'required|exists:experience_levels,id',
            'salary_breakdown_id' => 'required|exists:salary_breakdowns,id',
            'title' => 'required|string',
            'total_yearly_compensation' => 'required|numeric',
            'base_salary' => 'required|numeric',
            'stock_grant_value' => 'nullable|numeric',
            'bonus' => 'nullable|numeric',
            'years_of_experience' => 'required|integer',
            'years_at_company' => 'required|integer',
            'education_level' => 'required|string',
            'gender' => 'nullable|string',
            'race' => 'nullable|string',
            'is_verified' => 'boolean',
            'additional_comments' => 'nullable|string',
            'comment_id' => 'nullable|exists:comments,id',
            'posted_at' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $salary = Salary::create($request->all());

        return response()->json($salary, 201);
    }

    public function index()
    {
        $salaries = Salary::with(['location', 'experienceLevel', 'industry'])->get();
        return response()->json($salaries);
    }

    public function show($id)
    {
        $salary = Salary::with(['location', 'experienceLevel', 'industry'])->findOrFail($id);
        return response()->json($salary);
    }
}