<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventList;
use App\Models\PropertyType;
use App\Models\Venue;
use App\Models\VenueType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Random\RandomException;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws RandomException
     */
    public function run(): void
    {
        $data = [
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/04/26/image_662ba1a546979.jpg",
                "name" => "Expo City Dubai",
                "address" => "Al Wasl Avenue, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/06/05/image_666065c4465d6.jpg",
                "name" => "Madinat Jumeirah",
                "address" => "Madinat Jumeirah, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/02/21/56/65d543192c5ac.jpg",
                "name" => "Grand Hyatt Dubai",
                "address" => "Dubai Healthcare City, Bur Dubai, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/04/12/image_6618d6ba6676b.jpg",
                "name" => "InterContinental Dubai Festival City, an...",
                "address" => "Dubai Festival City, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/03/15/image_65f48ed48754d.jpg",
                "name" => "Jumeirah Beach Hotel",
                "address" => "Jumeirah Beach Road, Umm Suqeim, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/02/21/56/65d5432139adc.jpg",
                "name" => "Hilton Dubai Al Habtoor City",
                "address" => "Al Habtoor City, Sheikh Zayed Road, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/04/26/image_662ba3bd4c20c.jpg",
                "name" => "Dubai World Trade Centre",
                "address" => "Sheikh Zayed Road, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/04/23/image_6627c0827f85c.jpeg",
                "name" => "Address Beach Resort",
                "address" => "The Walk, Jumeirah Beach Residence, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/04/25/image_662a833e3c09f.jpg",
                "name" => "Le Meridien Dubai Hotel & Conference...",
                "address" => "Airport Road, Al Gharoud, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/04/11/image_6617b9f6ea192.jpg",
                "name" => "Atlantis The Palm",
                "address" => "Crescent Road, The Palm Jumeirah, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/04/24/image_6628bef76524b.jpg",
                "name" => "Museum of The Future",
                "address" => "Sheikh Zayed Road, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/04/30/image_66311a652957b.png",
                "name" => "Dubai Opera",
                "address" => "Sheikh Mohammed bin Rashid Blvd, Downtown Dubai, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/03/15/image_65f40bccd7053.jpg",
                "name" => "V Hotel Dubai, Curio Collection by Hilton",
                "address" => "Al Habtoor City, Sheikh Zayed Road, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/03/15/image_65f416f22dbc7.jpg",
                "name" => "JW Marriott Hotel Marina",
                "address" => "Al Marsa Street 66, Dubai Marina, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/07/18/image_669883b1f013b.webp",
                "name" => "Movenpick Grand Al Bustan Dubai",
                "address" => "Casablanca St - Al Garhoud - Dubai - United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/07/24/image_66a0f575c7cad.jpg",
                "name" => "Jumeirah Emirates Towers",
                "address" => "Sheikh Zayed Road, Trade Center 2, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/04/24/image_6628c8f61a1e8.jpg",
                "name" => "Etihad Museum",
                "address" => "1 Jumeirah Street, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/03/10/image_65ed7933561c0.jpg",
                "name" => "DoubleTree by Hilton Dubai - Jumeirah Beach",
                "address" => "Jumeirah Beach Residence, The Walk, Jumeirah Beach Residence, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/02/21/55/65d543021fbc6.jpg",
                "name" => "The Ritz-Carlton, Dubai",
                "address" => "The Walk, Jumeirah Beach Residence, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/04/25/image_662a883cb705d.jpg",
                "name" => "Conrad Dubai",
                "address" => "Sheikh Zayed Road, Trade Center 1, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/02/21/53/65d5429305783.jpg",
                "name" => "Jumeirah Creekside Hotel",
                "address" => "Rebat St, Al Garhoud, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/03/12/image_65ef8d17c6d77.jpg",
                "name" => "Swissotel Al Murooj Dubai",
                "address" => "Al Mustaqbal St., Opposite The Dubai Mall, Downtown, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/07/18/image_66990102ef251.jpg",
                "name" => "The H Hotel",
                "address" => "1 Sheikh Zayed Rd - Trade Centre - Trade Centre 1 - Dubai - United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/04/25/image_662a207befca0.jpg",
                "name" => "Oaks IBN Battuta Gate Dubai",
                "address" => "Garden Cross Road Opp. Ibn Battuta Mall, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/04/23/image_6627be1f90d10.jpg",
                "name" => "Crowne Plaza Dubai Festival City",
                "address" => "Po Box 7185 Dubai, Dubai Festival City, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/04/23/image_6627bf1b95bf8.jpg",
                "name" => "Sheraton Jumeirah Beach Resort",
                "address" => "Al Mamsha Road, P.O. Box 53567, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/02/21/54/65d542a7858c2.jpg",
                "name" => "Sofitel Dubai The Palm",
                "address" => "East - Crescent Rd - The Palm Jumeirah - Dubai - United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/04/24/image_6628b5dd2ae80.jpg",
                "name" => "The Ritz-Carlton DIFC",
                "address" => "Gate Village, DIFC, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/07/24/image_66a08d580eb02.jpg",
                "name" => "Waldorf Astoria Dubai International Fina...",
                "address" => "Burj Daman, Al Mustaqbal Street, DIFC, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/02/21/53/65d54291ecf3c.jpg",
                "name" => "Fairmont Dubai",
                "address" => "Sheikh Zayed Road, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/04/23/image_6627be1f90d10.jpg",
                "name" => "Crowne Plaza Dubai Festival City",
                "address" => "Po Box 7185 Dubai, Dubai Festival City, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/04/24/image_6628c015c6355.jpg",
                "name" => "Dukes The Palm, a Royal Hideaway Hotel",
                "address" => "Palm Jumeirah, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/03/15/image_65f41095c6df7.jpg",
                "name" => "The Westin Dubai Mina Seyahi Beach Reso...",
                "address" => "Al Sufouh, Jumeirah, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/02/21/54/65d542a7858c2.jpg",
                "name" => "Sofitel Dubai The Palm",
                "address" => "East - Crescent Rd - The Palm Jumeirah - Dubai - United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/02/21/53/65d54291ecf3c.jpg",
                "name" => "Fairmont Dubai",
                "address" => "Sheikh Zayed Road, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/07/24/image_66a08d580eb02.jpg",
                "name" => "Waldorf Astoria Dubai International Fina...",
                "address" => "Burj Daman, Al Mustaqbal Street, DIFC, Dubai, United Arab Emirates"
            ],
            [
                "image" => "https://venuewise.com/upload/venue/gallery/thumbnails/2024/04/24/image_6628b5dd2ae80.jpg",
                "name" => "The Ritz-Carlton DIFC",
                "address" => "Gate Village, DIFC, Dubai, United Arab Emirates"
            ]
        ];

        foreach ($data as $value){
            $venue = Venue::query()->firstOrCreate([
                'image' => $value['image'],
                'name' => $value['name'],
            ],[
                'address' => $value['address'],
                'description' => fake()->paragraph(5),
                'phone' => fake()->phoneNumber(),
                'latitude' => fake()->latitude(),
                'longitude' => fake()->latitude(),
                'sortid' => random_int(10,1000),
            ]);

            $eventLists = EventList::all()->random(random_int(1, 5));
            foreach ($eventLists as $eventList) {
                Event::query()->create([
                    'venue_id' => $venue->id,
                    'event_list_id' => $eventList->id,
                    'title' => fake()->words(10,true),
                    'description' => fake()->paragraph(5),
                ]);
            }

            $propertyTypes = PropertyType::all()->random(random_int(1,2));
            $venue->propertyTypes()->attach($propertyTypes);

            $venueTypes = VenueType::all()->random(random_int(1, 7));
            $venue->venueTypes()->attach($venueTypes);
        }
    }
}
