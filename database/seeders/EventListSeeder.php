<?php

namespace Database\Seeders;

use App\Models\EventList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eventLists = [
            "Wedding",
            "Conferences",
            "Seminars",
            "Exhibitions",
            "Product Launches and Demos",
            "Corporate Events",
            "Team Building Activities",
            "Religious Festivals and Events",
            "Small Meetings",
            "Concerts and Music Festivals",
            "Government Events",
            "Networking Events",
            "Theaters and Performances",
            "Trainings and Workshops"
        ];
        foreach ($eventLists as $title){
            EventList::query()->firstOrCreate(['title' => $title]);
        }
    }
}
