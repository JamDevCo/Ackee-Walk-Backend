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
use Illuminate\Support\Facades\Mail;
use App\Mail\SalaryVerificationMail;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

class SalaryController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'location_id' => 'required|exists:locations,id', 
            'company_id' => 'required|exists:companies,id', 
            'industry_id' => 'required|exists:industries,id', 
            'title' => 'required|string',
            'base_salary' => 'required|numeric',
            'email' => 'required|email', 
            'experience_id' => 'nullable|exists:experience_levels,id',
            'total_yearly_compensation' => 'nullable|numeric',
            'stock_grant_value' => 'nullable|numeric',
            'bonus' => 'nullable|numeric',
            'years_of_experience' => 'nullable|integer',
            'years_at_company' => 'nullable|integer',
            'education_level' => 'nullable|string',
            'gender' => 'nullable|string',
            'race' => 'nullable|string',
            'is_verified' => 'nullable|boolean',
            'additional_comments' => 'nullable|string',
            'posted_at' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $verificationToken = Str::random(32);
        $data = $request->all();
        $data['verification_token'] = $verificationToken;
        $data['is_verified'] = false;

        $salary = Salary::create($data);

        Mail::to($request->email)->send(new SalaryVerificationMail($verificationToken));

        return response()->json([
            'message' => 'Salary submitted successfully. Please check your email to verify.',
            'salary' => $salary
        ], 201);
    }

    public function index()
    {
        $salaries = Salary::with(['company', 'location', 'experienceLevel', 'industry'])
            ->where('is_verified', true)
            ->paginate(10);
        return response()->json($salaries);
    }

    public function show($id)
    {
        $salary = Salary::with(['company', 'location', 'experienceLevel', 'industry'])
            ->where('is_verified', true) 
            ->findOrFail($id);
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
        $salary = Salary::where('is_verified', true) 
            ->findOrFail($id);

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
        $salary = Salary::where('is_verified', true) 
            ->findOrFail($id);
        $salary->delete();

        return response()->json(null, 204);
    }

    public function search(Request $request)
    {
        $query = Salary::query()->with(['company', 'location', 'experienceLevel', 'industry'])
            ->where('is_verified', true);
        // test
        // Search
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function (Builder $query) use ($searchTerm) {
                $query->whereHas('company', function (Builder $query) use ($searchTerm) {
                    $query->where('name', 'like', "%{$searchTerm}%");
                })
                ->orWhere('title', 'like', "%{$searchTerm}%")
                ->orWhereHas('industry', function (Builder $query) use ($searchTerm) {
                    $query->where('name', 'like', "%{$searchTerm}%");
                });
            });
        }
 
        if ($request->has('industry')) {
            $query->where('industry_id', $request->industry);
        }

        if ($request->has('location')) {
            $query->where('location_id', $request->location);
        }

        if ($request->has('experience_level')) {
            $query->where('experience_id', $request->experience_level);
        }

        $sortField = $request->input('sort_by', 'created_at');
        $sortDirection = $request->input('sort_direction', 'desc');
        $query->orderBy($sortField, $sortDirection);

        $perPage = $request->input('per_page', 15);
        $salaries = $query->paginate($perPage);

        return response()->json($salaries);
    }
}