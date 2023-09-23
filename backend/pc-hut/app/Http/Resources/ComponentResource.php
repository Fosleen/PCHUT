<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ComponentResource extends JsonResource
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
            'model' => $this->model,
            'price' => $this->price,
            'productable_id' => $this->productable_id,
            'productable_type' =>  $this->productable_type,
            'product_type_cro' => $this->product_type_cro,
            'discount' => $this->discount,
            'description' => $this->description,
            'productable_details' => $this->productable, // todo we don't need this anymore i think

            'socket_name' => $this->when($this->productable_type === 'App\\Models\\CPU' || $this->productable_type === 'App\\Models\\Motherboard', function () {
                return $this->productable->socket->name;
            }),

            'memory' => $this->when($this->productable_type === 'App\\Models\\GPU' || $this->productable_type === 'App\\Models\\Motherboard', function () {
                return $this->productable->memory;
            }),

            'ram_type' => $this->when($this->productable_type === 'App\\Models\\Motherboard', function () {
                return $this->productable->ramType;
            }),

            'storage_type' => $this->when($this->productable_type === 'App\\Models\\Storage', function () {
                return $this->productable->storageType;
            }),

            'type' => $this->when($this->productable_type === 'App\\Models\\Keyboard', function () {
                return $this->productable->type;
            }),

            'switch_type' => $this->when($this->productable_type === 'App\\Models\\Keyboard', function () {
                return $this->productable->switchType;
            }),

            'case_size' => $this->when($this->productable_type === 'App\\Models\\PcCase', function () {
                return $this->productable->caseSize;
            }),

            'cooling_type' => $this->when($this->productable_type === 'App\\Models\\Cooling', function () {
                return $this->productable->coolingType;
            }),

            'size' => $this->when($this->productable_type === 'App\\Models\\Storage' || $this->productable_type === 'App\\Models\\Monitor' || $this->productable_type === 'App\\Models\\PcCase', function () {
                return $this->productable->size;
            }),

            'cores' => $this->when($this->productable_type === 'App\\Models\\CPU', function () {
                return $this->productable->cores;
            }),

            'refresh_rate' => $this->when($this->productable_type === 'App\\Models\\Monitor', function () {
                return $this->productable->refresh_rate;
            }),

            'wired' => $this->when($this->productable_type === 'App\\Models\\Keyboard' || $this->productable_type === 'App\\Models\\Mouse', function () {
                return $this->productable->wired;
            }),

            'power' => $this->when($this->productable_type === 'App\\Models\\PSU', function () {
                return $this->productable->power;
            }),

            'connector' => $this->when($this->productable_type === 'App\\Models\\Keyboard', function () {
                return $this->productable->connector;
            }),

            'socket' => $this->when($this->productable_type === 'App\\Models\\Motherboard' || $this->productable_type === 'App\\Models\\CPU', function () {
                return $this->productable->socket;
            }),

            'manufacturer' => $this->manufacturer,
            'images' =>  $this->images->pluck('url')->toArray()
        ];
    }
}
