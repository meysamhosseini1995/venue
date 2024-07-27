<?php

namespace App\Http\Controllers\Api\Application\V1;

use App\Http\Controllers\Controller;
use App\Repositories\EventListRepository;
use App\Repositories\PropertyTypeRepository;
use App\Repositories\VenueTypeRepository;
use App\Services\HttpResponse\Facades\HttpResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct(
        private readonly VenueTypeRepository $venueTypeRepository,
        private readonly PropertyTypeRepository $propertyTypeRepository,
        private readonly EventListRepository $eventListRepository,
    ){}

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $venueTypes = $this->venueTypeRepository->withCount(['venues'])->all();
        $propertyTypes = $this->propertyTypeRepository->withCount(['venues'])->all();
        $eventList = $this->eventListRepository->withCount(['events'])->all();
        return HttpResponse::success([
            'venue_types' => $venueTypes,
            'property_types' => $propertyTypes,
            'event_list' => $eventList,
        ]);
    }

}
