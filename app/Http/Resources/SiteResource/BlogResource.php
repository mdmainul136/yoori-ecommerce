<?php

namespace App\Http\Resources\SiteResource;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                    => $this->id,
            'slug'                  => $this->slug,
            'title'                 => $this->getTranslation('title',languageCheck()),
            'short_description'     => nullCheck($this->getTranslation('short_description',languageCheck())),
            'thumbnail'             => $this->thumbnail,
            'published_date'        => $this->published_date,
            'tags'                  => $this->tags,
            'created_name'          => $this?->user->first_name .' '.$this?->user->last_name,
        ];
    }
}
