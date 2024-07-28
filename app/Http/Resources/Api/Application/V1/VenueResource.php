<?php

namespace App\Http\Resources\Api\Application\V1;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VenueResource extends JsonResource
{

    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'name'           => $this->name,
            'image'          => $this->image,
            'address'        => $this->address,
            'description'    => $this->whenHas('description'),
            'phone'          => $this->whenHas('phone'),
            'latitude'       => $this->whenHas('latitude'),
            'longitude'      => $this->whenHas('longitude'),
            'sortid'         => $this->sortid,
            'morph_sortId'   => $this->sortId ?? null,
            'created_at'     => $this->created_at,
            'updated_at'     => $this->updated_at,
            'events'         => EventListResource::collection($this->whenLoaded('eventLists')),
            'property_types' => PropertyTypeResource::collection($this->whenLoaded('propertyTypes')),
            'venue_types'    => VenueTypeResource::collection($this->whenLoaded('venueTypes')),
        ];
    }


}
