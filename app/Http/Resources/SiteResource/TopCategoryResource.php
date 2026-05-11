<?php

namespace App\Http\Resources\SiteResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\SiteResource\HomeNestedCategoryResource;

class TopCategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'parent_id'         => $this->parent_id,
            'slug'              => $this->slug,
            'title'             => $this->getTranslation('title',languageCheck()),
            'icon'              => $this->icon,
            'child_categories'  => HomeNestedCategoryResource::collection($this->childCategories)
        ];
    }
}
