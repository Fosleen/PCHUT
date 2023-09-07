<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GPUResource extends JsonResource
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
            'memory' => $this->memory,
            'product_type_cro' => $this->component->product_type_cro,
            'productable_type' =>  $this->component->productable_type,
            'discount' => $this->discount,
            'manufacturer_img' => $this->component->manufacturer->logo_url,
            'manufacturer' => $this->component->manufacturer->name,
            'images' => $this->component->images->pluck('url')->toArray(),
        ];
    }
}
