<?php


namespace App\Repositories;

use App\Models\VenueType;

class VenueTypeRepository extends Repository
{

    protected array $likeSearch = [
        'title',
    ];

    protected array $selectableList = [
        'id',
        'title',
        'created_at',
        'updated_at'
    ];

    /**
     * BaseRepository constructor.
     *
     * @param mixed $model
     */
    public function __construct(VenueType $model)
    {
        $this->model = $model;
    }


    public function filter(): static
    {
        parent::filter();
        return $this;
    }

}
