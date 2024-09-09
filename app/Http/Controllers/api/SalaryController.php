<?php

namespace App\Http\Controllers\Api;

use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Location;
use App\Models\Company;
use App\Models\Industry;
use App\Models\ExperienceLevel;
use App\Http\Controllers\Controller;

class SalaryController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'location_id' => 'required|exists:locations,id',
            'company_id' => 'required|exists:companies,id',
            'industry_id' => 'required|exists:industries,id',
            'experience_id' => 'required|exists:experience_levels,id',
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
        $salaries = Salary::with(['company', 'location', 'experienceLevel', 'industry'])->get();
        return response()->json($salaries);
    }

    public function show($id)
    {
        $salary = Salary::with(['company', 'location', 'experienceLevel', 'industry'])->findOrFail($id);
        return response()->json($salary);
    }

    public function getFormData()
    {
        $data = [
            'locations' => Location::select('id', 'country', 'region', 'city')->get(),
            'companies' => Company::select('id', 'name')->get(),
            'industries' => Industry::select('id', 'name')->get(),
            'experienceLevels' => ExperienceLevel::select('id', 'name')->get(),
        ];

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $salary = Salary::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'location_id' => 'exists:locations,id',
            'company_id' => 'exists:companies,id',
            'industry_id' => 'exists:industries,id',
            'experience_id' => 'exists:experience_levels,id',
            'title' => 'string',
            'total_yearly_compensation' => 'numeric',
            'base_salary' => 'numeric',
            'stock_grant_value' => 'nullable|numeric',
            'bonus' => 'nullable|numeric',
            'years_of_experience' => 'integer',
            'years_at_company' => 'integer',
            'education_level' => 'string',
            'gender' => 'nullable|string',
            'race' => 'nullable|string',
            'is_verified' => 'boolean',
            'additional_comments' => 'nullable|string',
            'posted_at' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $salary->update($request->all());

        return response()->json($salary);
    }

    public function destroy($id)
    {
        $salary = Salary::findOrFail($id);
        $salary->delete();

        return response()->json(null, 204);
    }
}