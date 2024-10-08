<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Company extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'logo',
        'website',
        'description',
        'founded_year',
        'headquarters',
        'employee_count',
        'industry'
    ];

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }
}