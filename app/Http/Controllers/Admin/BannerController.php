<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Interfaces\Admin\Slider\BannerLangInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\Admin\BannerRequest;
use App\Repositories\Interfaces\Admin\LanguageInterface;
use App\Repositories\Interfaces\Admin\Slider\BannerInterface;

class BannerController extends Controller
{
    protected $banner, $languages, $bannerLang;

    public function __construct(BannerInterface $banner, LanguageInterface $languages, BannerLangInterface $bannerLang)
    {
        $this->banner = $banner;
        $this->languages = $languages;
        $this->bannerLang = $bannerLang;
    }

    public function create()
    {
        return view('admin.banners.form');
    }

    public function store(BannerRequest $request): \Illuminate\Http\RedirectResponse
    {
        if (config('app.demo_mode')):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;
        DB::beginTransaction();
        try {
            $this->banner->store($request->all());
            DB::commit();
            Toastr::success(__('Created Successfully'));

            return redirect()->route('sliders.index');

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

            if ($bannerLang  = $this->banner->getByLang($id, $lang)) :
                return view('admin.banners.update', compact('bannerLang', 'languages', 'lang', 'r'));
            else:
                Toastr::error(__('Not found'));
                return back();
            endif;
        } catch (\Exception $e) {
            Toastr::error($e->getMessage());
            return back();
        }
    }

    // public function update(BannerRequest $request, $id): \Illuminate\Http\RedirectResponse
    public function update(BannerRequest $request, $id)
    {

        if (config('app.demo_mode')):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;
        DB::beginTransaction();
        try {
            $this->banner->update($request->all(), $id);
            DB::commit();
            Toastr::success(__('Updated Successfully'));
            return redirect()->route('sliders.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return back();
        }
    }

    public function statusChange(Request $request)
    {
        if (config('app.demo_mode')):
            $response['message'] = __('This function is disabled in demo server.');
            $response['title'] = __('Ops..!');
            $response['status'] = 'error';
            return response()->json($response);
        endif;
        DB::beginTransaction();
        try {
            $this->banner->statusChange($request['data']);
            $response['message'] = __('Updated Successfully');
            $response['title'] = __('Success');
            $response['status'] = 'success';
            DB::commit();
            return response()->json($response);
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
}
