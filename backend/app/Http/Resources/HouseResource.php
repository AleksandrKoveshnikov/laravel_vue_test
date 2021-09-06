<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HouseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->Name,
            'price' => $this->Price,
            'bedrooms' => $this->Bedrooms,
            'bathrooms' => $this->Bathrooms,
            'storeys' => $this->Storeys,
            'garages' => $this->Garages,
        ];
    }
}
