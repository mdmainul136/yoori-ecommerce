<?php

namespace App\Http\Resources\SiteResource;

use Illuminate\Http\Resources\Json\ResourceCollection;

class VideoPaginateResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($data) {
                return [
                    'id'        => $data->id,
                    'slug'      => $data->slug,
                    'is_live'   => (bool)$data->is_live,
                    'thumbnail' => getFileLink('299x536',$data->thumbnail),
                    'title'     => $data->getTranslation('title',languageCheck()),
                    'user_type' => optional($data->user)->user_type,
                    'profile_image' => optional($data->user)->profile_image,
                    'user_profile_image' => optional($data->user)->user_profile_image,
                    'full_name' => optional($data->user)->full_name,
                ];
            }),

            'total'         => $this->total(),
            'count'         => $this->count(),
            'per_page'      => $this->perPage(),
            'current_page'  => $this->currentPage(),
            'total_pages'   => $this->lastPage(),
            'last_page'     => $this->lastPage(),
            'next_page_url' => $this->nextPageUrl(),
            'has_more_data' => $this->hasMorePages(),
        ];
    }
}
