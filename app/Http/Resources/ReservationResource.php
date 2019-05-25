<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    public static $wrap = false;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user->id,
            'location_id' => $this->location->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'phone' => $this->phone,
            'duration' => $this->duration,
            'adult' => (boolean) $this->adult,
            'more' => $this->more,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'message' => 'Thank you',
        ];
    }
}
