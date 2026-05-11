<?php

namespace App\Repositories\Admin\Slider;

use App\Models\BannerLanguage;
use App\Repositories\Interfaces\Admin\Slider\BannerLangInterface;

class BannerLanguageRepository implements BannerLangInterface
{
    public function find($id)
    {
        return BannerLanguage::find($id);
    }

    public function store($request)
    {
        return BannerLanguage::create($request);
    }

    public function update($request)
    {
        $banner = BannerLanguage::find($request['banner_lang_id']);
        $banner->update($request);
        return $banner;
    }
}
