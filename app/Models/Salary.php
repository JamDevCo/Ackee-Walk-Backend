<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Salary extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'role_id',
        'location_id',
        'company_id',
        'industry_id',
        'experience_id',
        'salary_breakdown_id',
        'title',
        'total_yearly_compensation',
        'base_salary',
        'stock_grant_value',
        'bonus',
        'years_of_experience',
        'years_at_company',
        'education_level',
        'gender',
        'race',
        'is_verified',
        'verification_token',
        'additional_comments',
        'comment_id',
        'posted_at',
    ];

    protected $casts = [
        'posted_at' => 'datetime',
        'total_yearly_compensation' => 'decimal:2',
        'base_salary' => 'decimal:2',
        'stock_grant_value' => 'decimal:2',
        'bonus' => 'decimal:2',
        'is_verified' => 'boolean',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    public function experienceLevel()
    {
        return $this->belongsTo(ExperienceLevel::class, 'experience_id');
    }

    public function salaryBreakdown()
    {
        return $this->belongsTo(SalaryBreakdown::class);
    }
}