<?php


namespace App\Repositories;

use App\Models\Venue;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class VenueRepository extends Repository
{

    protected array $likeSearch = [
        'name',
        'address'
    ];

    protected array $selectableList = [
        'id',
        'name',
        'description', 
        'image', 
        'address',
        'phone',
        'latitude',
        'longitude', 
        'sortid',
        'created_at',
        'updated_at'
    ];

    /**
     * BaseRepository constructor.
     *
     * @param mixed $model
     */
    public function __construct(Venue $model)
    {
        $this->model = $model;
    }


    public function filter(): static
    {
        parent::filter();
        if (request()->filled('eventList') && is_array(request()->input('eventList'))) {
            $eventListIds = request()->input('eventList');
            $this->model =  $this->model->whereHas('eventLists', function($query) use ($eventListIds) {
                $query->whereIn('event_list_id', $eventListIds);
            });
        }
        if (request()->filled('venueType') && is_array(request()->input('venueType'))) {
            $venueTypeIds = request()->input('venueType');
            $this->model =  $this->model->whereHas('venueTypes', function($query) use ($venueTypeIds) {
                $query->whereIn('venue_type_id', $venueTypeIds);
            });
        }
        if (request()->filled('propertyType') && is_array(request()->input('propertyType'))) {
            $propertyTypeIds = request()->input('propertyType');
            $this->model =  $this->model->whereHas('propertyTypes', function($query) use ($propertyTypeIds) {
                $query->whereIn('property_type_id', $propertyTypeIds);
            });
        }
        return $this;
    }


    public function sortByEventList($eventListId): LengthAwarePaginator
    {
        return $this->model
            ->leftJoin('events', 'venues.id', '=', 'events.venue_id')
            ->leftJoin('sorts', function ($join) {
                $join->on('venues.id', '=', 'sorts.venue_id')
                    ->on('events.event_list_id', '=', 'sorts.sortable_id')
                    ->where('sortable_type', '=', 'App\Models\EventList');
            })
            ->where('events.event_list_id', $eventListId)
            ->orderBy('sorts.sortId','DESC')
            ->select([
                'venues.*',
                'events.venue_id',
                'events.event_list_id',
                'sorts.sortable_type as sortBy',
                'sorts.sortId',
            ])->paginate($this->getPerPage());
    }


    public function sortByVenueType($venueTypeId): LengthAwarePaginator
    {
        return $this->model
            ->leftJoin('venue_venue_type', 'venues.id', '=', 'venue_venue_type.venue_id')
            ->leftJoin('sorts', function ($join) {
                $join->on('venues.id', '=', 'sorts.venue_id')
                    ->on('venue_venue_type.venue_type_id', '=', 'sorts.sortable_id')
                    ->where('sortable_type', '=', 'App\Models\VenueType');
            })
            ->where('venue_venue_type.venue_type_id', $venueTypeId)
            ->orderBy('sorts.sortId','DESC')
            ->select([
                'venues.*',
                'venue_venue_type.venue_id',
                'venue_venue_type.venue_type_id',
                'sorts.sortable_type as sortBy',
                'sorts.sortId',
            ])->paginate($this->getPerPage());
    }


    public function sortByPropertyType($propertyTypeId): LengthAwarePaginator
    {
        return $this->model
            ->leftJoin('venue_property_type', 'venues.id', '=', 'venue_property_type.venue_id')
            ->leftJoin('sorts', function ($join) {
                $join->on('venues.id', '=', 'sorts.venue_id')
                    ->on('venue_property_type.property_type_id', '=', 'sorts.sortable_id')
                    ->where('sortable_type', '=', 'App\Models\VenueType');
            })
            ->where('venue_property_type.property_type_id', $propertyTypeId)
            ->orderBy('sorts.sortId','DESC')
            ->select([
                'venues.*',
                'venue_property_type.venue_id',
                'venue_property_type.property_type_id',
                'sorts.sortable_type as sortBy',
                'sorts.sortId',
            ])->paginate($this->getPerPage());
    }

}
