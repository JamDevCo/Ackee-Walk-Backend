<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class SalaryBreakdown extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['base_salary', 'bonus', 'stock', 'benefits'];

    protected $casts = [
        'benefits' => 'json',
    ];

    public function salary()
    {
        return $this->hasOne(Salary::class);
    }
}