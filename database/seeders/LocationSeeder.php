<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        $locations = [
            ['country' => 'Jamaica', 'region' => 'Kingston', 'city' => 'Kingston'],
            ['country' => 'Jamaica', 'region' => 'St. Andrew', 'city' => 'Half Way Tree'],
            ['country' => 'Jamaica', 'region' => 'St. Catherine', 'city' => 'Spanish Town'],
            ['country' => 'Jamaica', 'region' => 'Clarendon', 'city' => 'May Pen'],
            ['country' => 'Jamaica', 'region' => 'Manchester', 'city' => 'Mandeville'],
            ['country' => 'Jamaica', 'region' => 'St. Elizabeth', 'city' => 'Black River'],
            ['country' => 'Jamaica', 'region' => 'Westmoreland', 'city' => 'Savanna-la-Mar'],
            ['country' => 'Jamaica', 'region' => 'Hanover', 'city' => 'Lucea'],
            ['country' => 'Jamaica', 'region' => 'St. James', 'city' => 'Montego Bay'],
            ['country' => 'Jamaica', 'region' => 'Trelawny', 'city' => 'Falmouth'],
            ['country' => 'Jamaica', 'region' => 'St. Ann', 'city' => 'St. Ann’s Bay'],
            ['country' => 'Jamaica', 'region' => 'St. Mary', 'city' => 'Port Maria'],
            ['country' => 'Jamaica', 'region' => 'Portland', 'city' => 'Port Antonio'],
            ['country' => 'Jamaica', 'region' => 'St. Thomas', 'city' => 'Morant Bay'],
            ['country' => 'Jamaica', 'region' => 'Kingston', 'city' => 'Kingston'],
            ['country' => 'Jamaica', 'region' => 'St. Andrew', 'city' => 'Half Way Tree'],
            ['country' => 'Jamaica', 'region' => 'St. Catherine', 'city' => 'Spanish Town'],
            ['country' => 'Jamaica', 'region' => 'Clarendon', 'city' => 'May Pen'],
            ['country' => 'Jamaica', 'region' => 'Manchester', 'city' => 'Mandeville'],
            ['country' => 'Jamaica', 'region' => 'St. Elizabeth', 'city' => 'Black River'],
            ['country' => 'Jamaica', 'region' => 'Westmoreland', 'city' => 'Savanna-la-Mar'],
            ['country' => 'Jamaica', 'region' => 'Hanover', 'city' => 'Lucea'],
            ['country' => 'Jamaica', 'region' => 'St. James', 'city' => 'Montego Bay'],
            ['country' => 'Jamaica', 'region' => 'Trelawny', 'city' => 'Falmouth'],
            ['country' => 'Jamaica', 'region' => 'St. Ann', 'city' => 'St. Ann’s Bay'],
            ['country' => 'Jamaica', 'region' => 'St. Mary', 'city' => 'Port Maria'],
            ['country' => 'Jamaica', 'region' => 'Portland', 'city' => 'Port Antonio'],
            ['country' => 'Jamaica', 'region' => 'St. Thomas', 'city' => 'Morant Bay'],
        ];

            foreach ($locations as $location) {
                // Check if the location already exists
                if (!Location::where('country', $location['country'])
                             ->where('region', $location['region'])
                             ->where('city', $location['city'])
                             ->exists()) {
                    Location::create($location);
                }
            }
    }
}