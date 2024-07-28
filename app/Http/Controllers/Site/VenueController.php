<?php

namespace App\Http\Controllers\Site;

use App\Models\EventList;
use App\Models\PropertyType;
use App\Models\Venue;
use App\Models\VenueType;
use App\Repositories\VenueRepository;
use App\Repositories\VenueTypeRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class VenueController extends Controller
{
    public function __construct(
        private readonly VenueRepository $venueRepository,
    ){}


    /**
     * @return View
     */
    public function index(): View
    {
        return view('site.index');
    }


    /**
     * @param $id
     *
     * @return View
     */
    public function show($id): View
    {
        $venue = $this->venueRepository->findById($id,relations: ['eventLists','propertyTypes','venueTypes']);
        return view('site.show',['venue'=>$venue]);
    }



    public function venueFilteredByVenueType(VenueType $venueType):View
    {
        return view('site.venue-filtered-by-venue-type',['venueType'=>$venueType]);
    }

    public function venueFilteredByPropertyType(PropertyType $propertyType): View
    {
        return view('site.venue-filtered-by-property-type',['propertyType'=>$propertyType]);
    }

    public function venueFilteredByEventList(EventList $eventList): View
    {
        return view('site.venue-filtered-by-event-list',['eventList'=>$eventList]);
    }
}
