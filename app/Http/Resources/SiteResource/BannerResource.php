<?php

namespace App\Http\Resources\SiteResource;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'    => $this->id,
            'link'  => $this->link,
            'title' => $this->getTranslation('title', apiLanguage($request->lang)),
            'sub_title' => $this->getTranslation('sub_title', apiLanguage($request->lang)),
            'btn_text' => $this->getTranslation('btn_text', apiLanguage($request->lang)),
            'image' => addon_is_activated('ishopet') ? getFileLink('192x170',$this->image) : getFileLink('362x220',$this->image),
        ];
    }
}
