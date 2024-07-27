<?php


namespace App\Repositories;

use App\Models\Venue;

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
            $this->model =  $this->model->whereHas('events', function($query) use ($eventListIds) {
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

}
