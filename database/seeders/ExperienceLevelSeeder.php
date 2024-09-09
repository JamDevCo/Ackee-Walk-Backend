<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ExperienceLevel;

class ExperienceLevelSeeder extends Seeder
{
    public function run(): void
    {
        $levels = [
            'Entry Level', 'Mid Level', 'Senior Level', 'Executive Level', 'Management Level',
        ];  

        foreach ($levels as $level) {
            // Check if the ExperienceLevel already exists
            if (!ExperienceLevel::where('name', $level)->exists()) {
                ExperienceLevel::create(['name' => $level]);
            }
        }
    }
}