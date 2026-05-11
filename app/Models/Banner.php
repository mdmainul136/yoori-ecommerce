<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = ['order','image_id','image','link'];

    protected $appends = ['title', 'sub_title', 'btn_text'];

    protected $casts = ['image' => 'array'];


    public function bannerLanguage()
    {
        return $this->hasMany(BannerLanguage::class);
    }

    public function getTranslateAttribute()
    {
        $lang = languageCheck();
        $row = $this->bannerLanguage->where('banner_id',$this->id)->where('lang',$lang)->first();
        if (!$row)
            $row = $this->bannerLanguage->where('banner_id',$this->id)->where('lang','en')->first();
        return $row;
    }

    public function getTranslation($field, $lang = 'en')
    {
        $banner_translation  = $this->hasMany(BannerLanguage::class)->where('lang', $lang)->first();

        if (blank($banner_translation)):
            $banner_translation = $this->hasMany(BannerLanguage::class)->where('lang', 'en')->first();
        endif;

        return $banner_translation->$field;
    }



    public function getTitleAttribute()
    {
        return @$this->translate->title;
    }

    public function getSubTitleAttribute()
    {
        return @$this->translate->sub_title;
    }

    public function getBtnTextAttribute()
    {
        return @$this->translate->btn_text;
    }


}
