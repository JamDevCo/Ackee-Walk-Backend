<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        $companies = [
            'Jamaica Public Service Company', 'National Water Commission', 'Jamaica Broilers Group', 'Scotiabank Jamaica', 'FirstCaribbean International Bank',
            'Jamaica National Group', 'Cable & Wireless Jamaica', 'Digicel Jamaica', 'Flow Jamaica', 'Jamaica Observer',
            'Jamaica Stock Exchange', 'Jamaica Manufacturers Association', 'Jamaica Chamber of Commerce', 'Jamaica Business Development Corporation',
            'National Works Agency', 'Jamaica National Insurance Company', 'Jamaica National Building Society', 'Jamaica National Bank', 
            'Jamaica Tourist Board', 'Jamaica Hotel and Tourist Association', 'Jamaica Agricultural Society', 'Jamaica Coffee Industry Board',
            'Jamaica Dairy Development Board', 'Jamaica Fisheries Development Board', 'Jamaica Forestry Department', 'Jamaica Agricultural Marketing Corporation', 'Jamaica Agricultural Development Corporation',
            'Jamaica Bauxite Institute', 'Jamaica Mining and Geology Division', 'Jamaica Energy Partners', 'Jamaica Energy Council',
            'Jamaica Environmental Trust', 'Jamaica Wildlife Federation', 'Jamaica Conservation and Development Trust', 'Jamaica Environmental Protection Agency',
        ];

        foreach ($companies as $company) {
            // Check if the company already exists
            if (!Company::where('name', $company)->exists()) {
                Company::create(['name' => $company]);
            }
        }
    }
}