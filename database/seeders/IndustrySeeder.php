<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Industry;

class IndustrySeeder extends Seeder
{
    public function run(): void
    {
        $industries = [
            'Technology', 'Finance', 'Healthcare', 'Education', 'Retail',
            'Manufacturing', 'Entertainment', 'Automotive', 'Energy', 'Telecommunications',
            'Aerospace', 'Agriculture', 'Biotechnology', 'Chemicals', 'Construction', 'Consumer Goods', 'Defense', 'Electronics', 'Energy Storage', 'Environmental', 'Fashion', 'Food and Beverage', 'Gaming', 'Hospitality', 'Insurance', 'Logistics', 'Media', 'Mining', 'Non-profit', 'Pharmaceuticals', 'Real Estate', 'Renewable Energy', 'Security', 'Software', 'Sports', 'Transportation', 'Travel', 'Utilities', 'Waste Management',
        ];

        foreach ($industries as $industry) {
            // Check if the industry already exists
            if (!Industry::where('name', $industry)->exists()) {
                Industry::create(['name' => $industry]);
            }
        }
    }
}