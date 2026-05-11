<?php

namespace App\Repositories\Admin\Slider;

use App\Models\Slider;
use App\Traits\ImageTrait;
use App\Models\SliderLanguage;
use Illuminate\Support\Facades\DB;
use App\Repositories\Admin\Slider\SliderLangRepository;
use App\Repositories\Interfaces\Admin\Slider\SliderInterface;

class SliderRepository implements SliderInterface
{

    use ImageTrait;

    protected $sliderLangRepository;

    public function __construct(SliderLangRepository $sliderLangRepository)
    {
        $this->sliderLangRepository = $sliderLangRepository;
    }

    public function all()
    {
        return Slider::with('imageMedia', 'getLanguage')->latest();
    }


    public function get()
    {
        return Slider::leftJoin('slider_languages', 'slider_languages.slider_id', '=', 'sliders.id')
            ->select(
                'sliders.*',
                'slider_languages.id as sliders_lang_id',
                'slider_languages.title',
                'slider_languages.lang',
                'slider_languages.sub_title',
                'slider_languages.tag',
                'slider_languages.btn_text'
            );
    }



    public function paginate($limit): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->get()->latest()->where('lang', 'en')->where('for_mobile', 0)->paginate($limit);
    }

    public function find($id)
    {
        return Slider::leftJoin('slider_languages', 'slider_languages.slider_id', '=', 'sliders.id')
            ->select(
                'sliders.*',
                'slider_languages.id as sliders_lang_id',
                'slider_languages.title',
                'slider_languages.lang',
                'slider_languages.sub_title',
                'slider_languages.tag',
                'slider_languages.btn_text'
            )->find($id);
    }


    public function getByLang($id, $lang)
    {
        if ($lang == null):
            $sliderLang = SliderLanguage::with('slider')->where('lang', 'en')->where('slider_id', $id)->first();
        else:
            $sliderLang = SliderLanguage::with('slider')->where('lang', $lang)->where('slider_id', $id)->first();
            if (blank($sliderLang)):
                $sliderLang = SliderLanguage::with('slider')->where('lang', 'en')->where('slider_id', $id)->first();
                $sliderLang['translation_null'] = 'not-found';
            endif;
        endif;

        return $sliderLang;
    }


    public function store($request)
    {
        $width = addon_is_activated('ishopet') ? '726' : '675';
        $height = addon_is_activated('ishopet') ? '350' : '480';
        if ($request['bg_image'] != ''):
            $request['bg_image_id'] = $request['bg_image'];
            $request['bg_image'] = $this->getImageWithRecommendedSize($request['bg_image'], $width, $height, true);
        else:
            $request['bg_image'] = [];
        endif;
        if (key_exists('for_mobile', $request)):
            if ($request['for_mobile']):
                if (array_key_exists('product_id', $request) && $request['action_type'] == 'product') {
                    $request['link'] = $request['product_id'];
                } else if (array_key_exists('category_id', $request) && $request['action_type'] == 'category') {
                    $request['link'] = $request['category_id'];
                } else if (array_key_exists('brand_id', $request) && $request['action_type'] == 'brand') {
                    $request['link'] = $request['brand_id'];
                } else if (array_key_exists('sl', $request) && $request['action_type'] == 'seller') {
                    $request['link'] = $request['sl'];
                } else if (array_key_exists('blog_id', $request) && $request['action_type'] == 'blog') {
                    $request['link'] = $request['blog_id'];
                } else if (array_key_exists('slider_url', $request) && $request['action_type'] == 'url') {
                    $request['link'] = $request['slider_url'];
                }
            endif;
        endif;
        if (array_key_exists('for_mobile', $request)) {
            $request['for_mobile'] = 1;
        }

        $slider = Slider::create($request);


        // slider language
        $request['slider_id'] = $slider->id;
        $request['lang'] = 'en';
        $this->sliderLangRepository->store($request);
        return true;
    }

    public function update($request, $id)
    {
        $width = addon_is_activated('ishopet') ? '726' : '675';
        $height = addon_is_activated('ishopet') ? '350' : '480';
        $slider = Slider::find($id);
        if ($request['bg_image'] != ''):
            $request['bg_image_id'] = $request['bg_image'];
            $request['bg_image'] = $this->getImageWithRecommendedSize($request['bg_image'], $width, $height, true);
        else:
            $request['bg_image'] = [];
        endif;

        if (key_exists('for_mobile', $request)):
            if ($request['for_mobile']):
                if (array_key_exists('product_id', $request) && $request['action_type'] == 'product') {
                    $request['link'] = $request['product_id'];
                } else if (array_key_exists('category_id', $request) && $request['action_type'] == 'category') {
                    $request['link'] = $request['category_id'];
                } else if (array_key_exists('brand_id', $request) && $request['action_type'] == 'brand') {
                    $request['link'] = $request['brand_id'];
                } else if (array_key_exists('sl', $request) && $request['action_type'] == 'seller') {
                    $request['link'] = $request['sl'];
                } else if (array_key_exists('blog_id', $request) && $request['action_type'] == 'blog') {
                    $request['link'] = $request['blog_id'];
                } else if (array_key_exists('slider_url', $request) && $request['action_type'] == 'url') {
                    $request['link'] = $request['slider_url'];
                }
            endif;
        endif;

        if (array_key_exists('for_mobile', $request)) {
            $request['for_mobile'] = 1;
        }
        $slider->update($request);


        if (array_key_exists('for_mobile', $request)) {

            $request['slider_lang_id'] = $slider->id;

            $this->sliderLangRepository->update($request);
        }

        else{
            if ($request['slider_lang_id'] == ''):
                $this->sliderLangRepository->store($request);
            else:
                $this->sliderLangRepository->update($request);
            endif;
        }

        DB::commit();
        return true;

    }

    public function statusChange($request)
    {
        $slider = Slider::find($request['id']);
        $slider->status = $request['status'];
        $slider->save();
        return true;
    }
    //for api

    public function getSlider()
    {
        return Slider::leftJoin('slider_languages', 'slider_languages.slider_id', '=', 'sliders.id')
            ->select(
                'sliders.*',
                'slider_languages.id as sliders_lang_id',
                'slider_languages.title',
                'slider_languages.lang',
                'slider_languages.sub_title',
                'slider_languages.tag',
                'slider_languages.btn_text'
            );
    }


    public function frontendSliders()
    {
        return Slider::where('status', 1)->where('for_mobile', 0)->latest()->get();
    }




    public function mobileSliders($limit)
    {
        return Slider::where('for_mobile', 1)->orderBy('order')->where('status', 1)->paginate($limit);
    }

    public function homeScreenSliders()
    {
        return Slider::where('for_mobile', 1)->where('status', 1)->latest()->get();
    }
}
