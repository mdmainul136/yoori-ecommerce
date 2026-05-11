<?php

namespace App\Http\Resources\SiteResource;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
{
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'title' => $this->getTranslation('title', apiLanguage($request->lang)),
            'sub_title' => $this->getTranslation('sub_title', apiLanguage($request->lang)),
            'tag' => $this->getTranslation('tag', apiLanguage($request->lang)),
            'btn_text' => $this->getTranslation('btn_text', apiLanguage($request->lang)),
            'link' => $this->link,
            'slider_bg_image' => $this->slider_bg_image,
        ];
    }
}
