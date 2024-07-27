<?php

namespace Database\Seeders;

use App\Models\PropertyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $venueTypes = [
            "Special Venues",
            "Normal Venues",
            "Luxury Venues",
        ];
        foreach ($venueTypes as $title){
            PropertyType::query()->firstOrCreate(['title' => $title]);
        }
    }
}