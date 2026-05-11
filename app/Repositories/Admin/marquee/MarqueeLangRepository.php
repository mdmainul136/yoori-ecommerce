<?php

namespace App\Repositories\Admin\marquee;

use App\Models\MarqueeLanguage;
use Illuminate\Support\Facades\DB;

class MarqueeLangRepository
{

    public function find($id)
    {
        return MarqueeLanguage::find($id);
    }

    public function store($request)
    {
        $marquee_lang                      = new  MarqueeLanguage();
        $marquee_lang->title               = $request->title;
        $marquee_lang->marquee_id          = $request->marquee_id;
        $marquee_lang->lang                = $request->lang != '' ? $request->lang : 'en';
        $marquee_lang->save();
        return;
    }


    public function update($request)
    {
        $marquee_lang                      = $this->find($request->marquee_lang_id);
        $marquee_lang->title               = $request->title;
        $marquee_lang->marquee_id          = $request->marquee_id;
        $marquee_lang->lang                = $request->lang != '' ? $request->lang : 'en';
        $marquee_lang->save();
    }
}
