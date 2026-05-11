<?php

namespace App\Repositories\Admin\Slider;

use App\Models\SliderLanguage;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\Admin\Slider\SliderLangInterface;

class SliderLangRepository implements SliderLangInterface
{

    public function find($id)
    {
        return SliderLanguage::find($id);
    }

    public function store($request)
    {
        return SliderLanguage::create($request);

        // DB::beginTransaction();
        // try {
        //     $marquee_lang                      = new  MarqueeLanguage();
        //     $marquee_lang->title               = $request->title;
        //     $marquee_lang->marquee_id          = $request->marquee_id;
        //     $marquee_lang->lang                = $request->lang != '' ? $request->lang : 'en';
        //     $marquee_lang->save();
        //     DB::commit();
        //     return true;
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     return false;
        // }
    }


    public function langUpdate($request, $slider_id)
    {
        $is_slider = SliderLanguage::where('slider_id', $slider_id)->first();
        if ($is_slider) {
            $is_slider->update($request);
            return;
        }
        SliderLanguage::create($request);
        return;
    }

    public function update($request)
    {
        $slider = SliderLanguage::find($request['slider_lang_id']);
        $slider->update($request);
        return $slider;
    }
}
