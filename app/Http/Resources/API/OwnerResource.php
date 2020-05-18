<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Animal;

class OwnerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => "{$this->first_name} {$this->last_name}",
            "address" => "{$this->address_1}, {$this->address_2}, {$this->town},{$this->postcode}",
            "animals" => Animal::where('owner_id', '=', $this->id)->pluck('name'),
        ];
    }
}
