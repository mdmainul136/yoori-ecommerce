<?php

namespace App\Repositories\Interfaces\Admin\Slider;

interface BannerLangInterface{
    public function find($id);

    public function store($request);

    public function update($request);
}
