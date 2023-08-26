<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KeyboardResource extends JsonResource
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
            'connector' => $this->connector,
            'type' => $this->type,
            'wired' => $this->wired,
            'rgb' => $this->rgb,
            'product_type' => "Tipkovnica",
            'discount' => $this->discount,
            'manufacturer_img' => $this->component->manufacturer->logo_url,
            'manufacturer' => $this->component->manufacturer->name,
            'switch_type' => $this->switchType->name,
            'images' =>  [
                "https://www.gigahertz.com.ph/cdn/shop/products/razer_blackwidow_v4_pro_mechanical_gaming_keyboard_green_switches_ac60741_26662_1024x.jpg?v=1679294271",
                "https://assets2.razerzone.com/images/pnx.assets/9a4267d1a3614ac6bbc05bf89e706b3b/razer-blackwidow-v3-pro-usp01-mobile.jpg",
                "https://cdn11.bigcommerce.com/s-042b2/images/stencil/1280x1280/products/953538/670796/rz03-03531700-1__18453.1624295433.jpg?c=2",
                "https://aresstores.com/wp-content/uploads/2023/04/https-__hybrismediaprod.blob_.core_.windows.net_sys-master-phoenix-images-container_h74_h37_9477488148510_230216-bw-v4-pro-1500x1000-1.jpg",
                "https://images.unsplash.com/photo-1636487658620-e1049fa06242?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1172&q=80",
                "https://images.unsplash.com/photo-1655838770846-ca6c505a2e7f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80",
            ]
        ];
    }
}
