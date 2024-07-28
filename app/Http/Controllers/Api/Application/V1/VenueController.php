<?php

namespace App\Http\Controllers\Api\Application\V1;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\Api\Application\V1\VenueResource;
use App\Repositories\VenueRepository;
use App\Http\Controllers\Controller;

class VenueController extends Controller
{
    public function __construct(private readonly VenueRepository $venueRepository,){}



    public function index(): AnonymousResourceCollection
    {
        $venues = $this->venueRepository->searchLike()->filter()->paginate(['id', 'name', 'image', 'address', 'sortid', 'created_at', 'updated_at']);
        return VenueResource::collection($venues);
    }


    /**
     * @param $id
     *
     * @return VenueResource
     */
    public function show($id): VenueResource
    {
        $venue = $this->venueRepository->findById($id,relations: ['eventLists','propertyTypes','venueTypes']);
        return new VenueResource($venue);
    }

    /**
     * @param $id
     *
     * @return AnonymousResourceCollection
     */
    public function getVenueWithSortByEventList($id): AnonymousResourceCollection
    {
        $venues = $this->venueRepository->sortByEventList($id);
        return VenueResource::collection($venues);
    }


    /**
     * @param $id
     *
     * @return AnonymousResourceCollection
     */
    public function getVenueWithSortByVenueType($id): AnonymousResourceCollection
    {
        $venues = $this->venueRepository->sortByVenueType($id);
        return VenueResource::collection($venues);
    }


    /**
     * @param $id
     *
     * @return AnonymousResourceCollection
     */
    public function getVenueWithSortByPropertyType($id): AnonymousResourceCollection
    {
        $venues = $this->venueRepository->sortByPropertyType($id);
        return VenueResource::collection($venues);
    }

}
