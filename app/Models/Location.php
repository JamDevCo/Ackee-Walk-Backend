<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Location extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['country', 'region', 'city'];

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }
}