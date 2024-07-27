<?php

namespace App\Http\Resources\Api\Application\V1;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{

    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'name'          => $this->title,
            'address'       => $this->description,
            'event_list_id' => $this->event_list_id,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
            'event_list'    => new EventListResource($this->whenLoaded('eventList')),
        ];
    }


}
