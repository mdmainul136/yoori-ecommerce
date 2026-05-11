<?php

namespace App\Http\Resources\SiteResource;

use Illuminate\Http\Resources\Json\JsonResource;

class ViewedProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'product_name' => $this->product_name,
            'rating' => (double) $this->reviews_avg_rating,
            'image_72x72' => $this->image_72x72,
            'special_discount_type' => nullCheck($this->special_discount_type),
            'special_discount_check' => $this->special_discount_check,
            'discount_percentage' => $this->discount_percentage,
            'price' => supplierProductPriceCalculator((double) $this->price, $this),
        ];
    }
}
