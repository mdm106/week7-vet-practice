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
            "name" => $this->fullName(),
            "address" => $this->fullAddress(),
            "animals" => Animal::where('owner_id', '=', $this->id)->pluck('name'),
        ];
    }
}
