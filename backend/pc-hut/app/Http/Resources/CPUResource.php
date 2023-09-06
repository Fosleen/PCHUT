<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CPUResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return  [
            'id' => $this->id,
            'model' => $this->component->model,
            'price' => $this->component->price,
            'description' => $this->component->description,
            'cores' => $this->cores,
            'speed' => $this->speed,
            'product_type_cro' => $this->component->product_type_cro,
            'productable_id' =>  $this->component->productable_id,
            'productable_type' =>  $this->component->productable_type,
            'discount' => $this->discount,
            'manufacturer_img' => $this->component->manufacturer->logo_url,
            'manufacturer' => $this->component->manufacturer->name,
            'socket' => $this->socket->name,
            'images' =>  $this->component->images->pluck('url')->toArray(),
        ];
    }
}
