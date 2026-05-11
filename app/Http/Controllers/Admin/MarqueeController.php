<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Admin\marquee\MarqueeLangRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\Admin\MarqueeRequest;
use App\Repositories\Admin\marquee\MarqueeRepository;
use App\Repositories\Interfaces\Admin\LanguageInterface;

class MarqueeController extends Controller
{
    protected $marquee, $languages, $marqueeLangRepository;
    public function __construct(MarqueeRepository $marqueeRepository, MarqueeLangRepository $marqueeLangRepository, LanguageInterface $languages)
    {
        $this->marquee                  = $marqueeRepository;
        $this->languages                = $languages;
        $this->marqueeLangRepository    = $marqueeLangRepository;
    }


    public function index(Request $request)
    {
        try {
            $marquee = $this->marquee->paginate(get_pagination('index_form_paginate'), $request);
            return view('admin.marquee.index', compact('marquee'));
        } catch (\Exception $e) {
            Toastr::error($e->getMessage());
            return back();
        }
    }

    // public function store(MarqueeRequest $request): \Illuminate\Http\RedirectResponse
    public function store(MarqueeRequest $request)
    {
        if (config('app.demo_mode')):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;
        DB::beginTransaction();
        try {
            $this->marquee->store($request);
            DB::commit();
            Toastr::success(__('Created Successfully'));

            return redirect()->route('marquees');

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

            if ($marquee_language  = $this->marquee->getByLang($id, $lang)) :
                return view('admin.marquee.update', compact('marquee_language', 'languages', 'lang', 'r'));
            else:
                Toastr::error(__('Not found'));
                return back();
            endif;


        } catch (\Exception $e) {
            Toastr::error($e->getMessage());
            return back();
        }
    }

    public function update(MarqueeRequest $request): \Illuminate\Http\RedirectResponse
    {

        if (config('app.demo_mode')):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;
        DB::beginTransaction();
        try {
            $this->marquee->update($request);
            DB::commit();
            Toastr::success(__('Updated Successfully'));

            return redirect()->route('marquees');

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
            $this->marquee->statusChange($request['data']);
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
