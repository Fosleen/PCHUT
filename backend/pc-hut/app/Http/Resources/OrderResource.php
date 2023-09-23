<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'order_name' => $this->order_name,
            'order_address' => $this->order_address,
            'user_id' => $this->user_id,
            'payment' => $this->payment,
            'delivery_status' => $this->delivery_status,
            'components' => $this->component->map(function ($component) {
                return [
                    'id' => $component->id,
                    'productable_id' => $component->productable_id,
                    'productable_type' => $component->productable_type,
                    'model' => $component->model,
                    'price' => $component->price,
                    'discount' => $component->discount,
                    'product_type_cro' => $component->product_type_cro,
                    'description' => $component->description,
                    'manufacturer' => $component->manufacturer,
                    'quantity' => $component->pivot->quantity,
                    'images' => $component->images->map(function ($image) {
                        return $image->url;
                    }),
                ];
            }),
        ];
    }
}
