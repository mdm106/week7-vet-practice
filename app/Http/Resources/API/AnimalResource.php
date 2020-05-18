<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Owner;

class AnimalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {   
        $owner = Owner::where('id', '=', $this->owner_id)->get();
        return [
            "id" => $this->id,
            "name" => $this->name,
            "dob" => $this->dob,
            "weight" => $this->weight_kg,
            "height" => $this->height_kg,
            "biteyness" => $this->biteyness,
            "owner" => $owner[0]["first_name"] . " " . $owner[0]["last_name"],
        ];
    }
}
