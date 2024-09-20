<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Salary;
use App\Models\Location;
use App\Models\Company;
use App\Models\Industry;
use App\Models\ExperienceLevel;
use Faker\Factory as Faker;

class SalarySeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $locations = Location::pluck('id')->toArray();
        $companies = Company::pluck('id')->toArray();
        $industries = Industry::pluck('id')->toArray();
        $experienceLevels = ExperienceLevel::pluck('id')->toArray();

        for ($i = 0; $i < 40; $i++) {
            Salary::create([
                'location_id' => $faker->randomElement($locations),
                'company_id' => $faker->randomElement($companies),
                'industry_id' => $faker->randomElement($industries),
                'experience_id' => $faker->randomElement($experienceLevels),
                'title' => $faker->jobTitle,
                'base_salary' => $faker->numberBetween(30000, 150000),
                'total_yearly_compensation' => $faker->numberBetween(35000, 200000),
                'stock_grant_value' => $faker->optional()->numberBetween(1000, 50000),
                'bonus' => $faker->optional()->numberBetween(1000, 30000),
                'years_of_experience' => $faker->numberBetween(0, 20),
                'years_at_company' => $faker->numberBetween(0, 10),
                'education_level' => $faker->randomElement(['High School', 'Bachelor', 'Master', 'PhD']),
                'gender' => $faker->randomElement(['Male', 'Female', 'Other', 'Prefer not to say']),
                'race' => $faker->randomElement(['White', 'Black', 'Asian', 'Hispanic', 'Other', 'Prefer not to say']),
                'is_verified' => $faker->boolean(80), // 80% chance of being verified
                'additional_comments' => $faker->optional()->sentence,
                'posted_at' => $faker->dateTimeThisYear,
            ]);
        }
    }
}