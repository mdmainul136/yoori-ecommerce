<?php

namespace App\Http\Resources\SiteResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeNestedCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->id,
            'slug'              => $this->slug,
            'title'             => $this->getTranslation('title',languageCheck()),
            'popular_image'     => $this->popular_image,
            'top_image'         => $this->top_image,
        ];
    }
}
