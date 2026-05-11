<?php

namespace App\Repositories\Admin\marquee;

use App\Models\Marquee;
use App\Models\MarqueeLanguage;
use Illuminate\Support\Facades\DB;
use App\Repositories\Admin\marquee\MarqueeLangRepository;

class MarqueeRepository
{
    protected $marqueeLang;

    public function __construct(MarqueeLangRepository $marqueeLangRepository)
    {
        $this->marqueeLang = $marqueeLangRepository;
    }

    public function get($id)
    {
        return Marquee::find($id);
    }

    public function all()
    {
        return Marquee::leftJoin('marquee_languages', 'marquee_languages.marquee_id', '=', 'marquees.id')
            ->select(
                'marquees.*',
                'marquee_languages.id as marquee_lang_id',
                'marquee_languages.title',
                'marquee_languages.lang'
            );
    }

    public function paginate($limit, $request): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->all()->latest()->where('lang', 'en')
            ->when($request->q != null, function ($query) use ($request) {
                $query->whereHas('marqueeLanguages', function ($q) use ($request) {
                    $q->where('title', 'like', '%' . $request->q . '%');
                });
            })->paginate($limit);
    }

    public function getByLang($id, $lang)
    {
        if ($lang == null):
            $marqueeByLang = MarqueeLanguage::with('marquee')->where('lang', 'en')->where('marquee_id', $id)->first();
        else:
            $marqueeByLang = MarqueeLanguage::with('marquee')->where('lang', $lang)->where('marquee_id', $id)->first();
            if (blank($marqueeByLang)):
                $marqueeByLang = MarqueeLanguage::with('marquee')->where('lang', 'en')->where('marquee_id', $id)->first();
                $marqueeByLang['translation_null'] = 'not-found';
            endif;
        endif;

        return $marqueeByLang;
    }


    public function find($id)
    {
        return Marquee::leftJoin('marquee_languages', 'marquee_languages.marquee_id', '=', 'marquees.id')
            ->select(
                'marquee_languages.*',
                'marquee_languages.id as marquees_lang_id',
                'marquee_languages.title',
                'marquee_languages.lang',
            )->find($id);
    }

    public function store($request)
    {
        $marquee = new Marquee();
        $marquee->link = $request->link;
        $marquee->save();

        // slider language
        $request['marquee_id'] = $marquee->id;
        $request['lang'] = 'en';
        $this->marqueeLang->store($request);
        return true;
    }

    public function update($request)
    {
        $marquee = $this->get($request->marquee_id);
        $marquee->link = $request->link;
        $marquee->save();

        if ($request->marquee_lang_id == ''):
            $this->marqueeLang->store($request);
        else:
            $this->marqueeLang->update($request);
        endif;

        DB::commit();
        return true;
    }

    public function statusChange($request)
    {
        $marquee = Marquee::find($request['id']);
        $marquee->status = $request['status'];
        $marquee->save();
        return true;
    }
    //for api

    public function getMarquee()
    {
        return Marquee::leftJoin('marquee_languages', 'marquee_languages.marquee_id', '=', 'marquees.id')
            ->select(
                'marquee_languages.*',
                'marquee_languages.id as marquees_lang_id',
                'marquee_languages.title',
                'marquee_languages.lang',
            );
    }



    public function frontendMarquees()
    {
        return Marquee::select('id', 'link')->where('status', 1)->get();
    }
}
