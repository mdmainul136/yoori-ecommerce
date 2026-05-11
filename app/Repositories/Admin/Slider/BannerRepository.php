<?php

namespace App\Repositories\Admin\Slider;


use App\Models\Banner;
use App\Models\BannerLanguage;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\DB;
use App\Repositories\Admin\Slider\BannerLanguageRepository;
use App\Repositories\Interfaces\Admin\Slider\BannerInterface;

class BannerRepository implements BannerInterface
{
    use ImageTrait;

    protected $bannerLanguageRepository;

    public function __construct(BannerLanguageRepository $bannerLanguageRepository)
    {
        $this->bannerLanguageRepository = $bannerLanguageRepository;
    }

    public function all()
    {
        return Banner::leftJoin('banner_languages', 'banner_languages.banner_id', '=', 'banners.id')
            ->select(
                'banners.*',
                'banner_languages.id as banners_lang_id',
                'banner_languages.title',
                'banner_languages.lang',
                'banner_languages.sub_title',
                'banner_languages.btn_text'
            );
    }





    public function paginate($limit): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->all()->latest()->where('lang', 'en')->paginate($limit);
    }


    public function getByLang($id, $lang = null)
    {
        $lang = $lang ?? 'en';

        $bannerLang = BannerLanguage::with('banner')
            ->where('banner_id', $id)
            ->where('lang', $lang)
            ->first();

        if (!$bannerLang && $lang !== 'en') {
            $bannerLang = BannerLanguage::with('banner')
                ->where('banner_id', $id)
                ->where('lang', 'en')
                ->first();

            if ($bannerLang) {
                $bannerLang->translation_null = 'not-found';
            }
        }

        return $bannerLang;
    }


    public function find($id)
    {
        return Banner::leftJoin('banner_languages', 'banner_languages.banner_id', '=', 'banners.id')
            ->select(
                'banners.*',
                'banner_languages.id as banners_lang_id',
                'banner_languages.title',
                'banner_languages.lang',
                'banner_languages.sub_title',
                'banner_languages.btn_text'
            )->find($id);
    }


    public function store($request)
    {
        $width = addon_is_activated('ishopet') ? '192' : '362';
        $height = addon_is_activated('ishopet') ? '170' : '220';
        if ($request['image'] != ''):
            $request['image_id'] = $request['image'];
            $request['image'] = $this->getImageWithRecommendedSize($request['image'], $width, $height, true);
        else:
            $request['image'] = [];
        endif;

        $banner = Banner::create($request);

        // banner language store
        $request['banner_id'] = $banner->id;
        $request['lang'] = 'en';
        $this->bannerLanguageRepository->store($request);
        return true;
    }

    public function update($request, $id)
    {
        $width = '362';
        $height = '220';
        $banner = Banner::find($id);
        if ($request['image'] != ''):
            $request['image_id'] = $request['image'];
            $request['image'] = $this->getImageWithRecommendedSize($request['image'], $width, $height, true);
        else:
            $request['image'] = [];
        endif;

        $banner->update($request);


        if ($request['banner_lang_id'] == ''):
            $this->bannerLanguageRepository->store($request);
        else:
            $this->bannerLanguageRepository->update($request);
        endif;

        DB::commit();
        return true;
    }

    public function statusChange($request)
    {
        $slider = Banner::find($request['id']);
        $slider->status = $request['status'];
        $slider->save();
        return true;
    }
    //for api
    public function frontendBanners()
    {
        return Banner::orderBy('id','DESC')->where('status', 1)->latest()->get();
    }
}
