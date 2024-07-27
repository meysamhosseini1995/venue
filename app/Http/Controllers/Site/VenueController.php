<?php

namespace App\Http\Controllers\Site;

use App\Repositories\VenueRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class VenueController extends Controller
{
    public function __construct(private readonly VenueRepository $venueRepository,){}


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
        $venue = $this->venueRepository->findById($id,relations: ['events','propertyTypes','venueTypes']);
        return view('site.show',['venue'=>$venue]);
    }

}
