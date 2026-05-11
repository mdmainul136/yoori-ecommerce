<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;
use App\Repositories\Interfaces\Admin\LanguageInterface;
use App\Repositories\Interfaces\Admin\Slider\BannerInterface;
use App\Repositories\Interfaces\Admin\Slider\SliderInterface;
use App\Repositories\Interfaces\Admin\Slider\SliderLangInterface;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    protected $slider, $languages, $sliderLang;

    public function __construct(SliderInterface $slider, LanguageInterface $languages, SliderLangInterface $sliderLang)
    {
        $this->slider                   = $slider;
        $this->languages                = $languages;
        $this->sliderLang               = $sliderLang;
    }

    public function index(BannerInterface $banner)
    {
        try {
            $data = [
                'sliders' => $this->slider->paginate(get_pagination('index_form_paginate')),
                'banners' => $banner->paginate(get_pagination('index_form_paginate'))
            ];

            return view('admin.sliders.index', $data);
        } catch (\Exception $e) {
            Toastr::error($e->getMessage());
            return back();
        }
    }


    public function create(){
        return view('admin.sliders.form');
    }

    public function store(SliderRequest $request): \Illuminate\Http\RedirectResponse
    {
        if (config('app.demo_mode')):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;

        DB::beginTransaction();
        try {
            $this->slider->store($request->all());
            DB::commit();
            Toastr::success(__('Created Successfully'));

            if ($request->for_mobile)
            {
                return redirect()->route('mobile.slider.settings');
            }
            else{
                return redirect()->route('sliders.index');
            }

        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return back()->withInput();
        }
    }

    public function edit($id, Request $request)
    {
        try {


            $languages  = $this->languages->all()->orderBy('id', 'asc')->get();
            $r          = $request->r != ''? $request->r : $request->server('HTTP_REFERER');
            $lang       = $request->lang != '' ? $request->lang : \App::getLocale();

            if ($slider_language  = $this->slider->getByLang($id, $lang)) :
                return view('admin.sliders.update', compact('slider_language', 'languages', 'lang', 'r'));
            else:
                Toastr::error(__('Not found'));
                return back();
            endif;
        } catch (\Exception $e) {
            Toastr::error($e->getMessage());
            return back();
        }
    }

    public function update(SliderRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        if (config('app.demo_mode')):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;
        DB::beginTransaction();
        try {
            $this->slider->update($request->all(), $id);
            DB::commit();
            Toastr::success(__('Updated Successfully'));
            if ($request->for_mobile)
            {
                return redirect()->route('mobile.slider.settings');
            }
            else{
                return redirect()->route('sliders.index');
            }

        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return back();
        }
    }

    public function statusChange(Request $request)
    {
        if (config('app.demo_mode')):
            $response['message']    = __('This function is disabled in demo server.');
            $response['title']      = __('Ops..!');
            $response['status']     = 'error';
            return response()->json($response);
        endif;
        try {
            $this->slider->statusChange($request['data']);
            $response['message']    = __('Updated Successfully');
            $response['title']      = __('Success');
            $response['status']     = 'success';
            return response()->json($response);
        } catch (\Exception $e) {
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
}
