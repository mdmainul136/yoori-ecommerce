<?php

namespace App\Http\Resources\SiteResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MarqueeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'link' => $this->link,
            'title' => $this->getTranslation('title', apiLanguage($request->lang)),
        ];
    }
}
