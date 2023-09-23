<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MotherboardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return  [
            'productable_id' =>  $this->component->productable_id,
            'id' => $this->component->id,
            'model' => $this->component->model,
            'price' => $this->component->price,
            'description' => $this->component->description,
            'product_type_cro' => $this->component->product_type_cro,
            'productable_type' =>  $this->component->productable_type,
            'discount' => $this->discount,
            'manufacturer_img' => $this->component->manufacturer->logo_url,
            'manufacturer' => $this->component->manufacturer,
            'socket' => $this->socket,
            'socket_id' => $this->socket->id,
            'ram_type' => $this->ramType,
            'images' =>  $this->component->images->pluck('url')->toArray(),
        ];
    }
}
