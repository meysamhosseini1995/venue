<?php

namespace Database\Seeders;

use App\Models\VenueType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VenueTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $venueTypes = [
            "Arenas",
            "Art Galleries",
            "Auditoriums",
            "Bars / Clubs / Lounges",
            "Conference Centers",
            "Exhibition Centers",
            "Golf Courses",
            "Hotels",
            "Museums",
            "Performance Spaces",
            "Resorts",
            "Restaurants",
            "Special Venues",
            "Sports Complexes / Stadiums",
            "Theatres / Cinemas",
            "Villas / Palaces / Mansions"
        ];
        foreach ($venueTypes as $title){
            VenueType::query()->firstOrCreate(['title' => $title]);
        }
    }
}
