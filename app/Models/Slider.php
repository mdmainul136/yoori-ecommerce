<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = ['order','image','bg_image','image_id','bg_image_id','for_mobile','link','action_type'];

    protected $appends = ['slider_bg_image', 'title', 'sub_title', 'tag', 'btn_text'];

    protected $casts = ['image' => 'array','bg_image' => 'array'];


    public function bgImage(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Media::class,'bg_image_id');
    }

    public function currentLanguage(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SliderLanguage::class)->where('lang',languageCheck());
    }

    public function sliderLanguage(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SliderLanguage::class);
    }

    public function getTranslateAttribute()
    {
        $lang = languageCheck();
        $row = $this->sliderLanguage->where('slider_id',$this->id)->where('lang',$lang)->first();
        if (!$row)
            $row = $this->sliderLanguage->where('slider_id',$this->id)->where('lang','en')->first();

        return $row;
    }

    public function getTranslation($field, $lang = 'en')
    {
        $slider_translation  = $this->hasMany(SliderLanguage::class)->where('lang', $lang)->first();

        if (blank($slider_translation)):
            $slider_translation = $this->hasMany(SliderLanguage::class)->where('lang', 'en')->first();
        endif;

        return $slider_translation->$field;
    }




    public function category()
    {
        return $this->belongsTo(Category::class,'link');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class,'link');
    }
    public function blog()
    {
        return $this->belongsTo(Blog::class,'link');
    }

    public function getTitleAttribute()
    {
        return @$this->translate->title;
    }

    public function getSubTitleAttribute()
    {
        return @$this->translate->sub_title;
    }

    public function getTagAttribute()
    {
        return @$this->translate->tag;
    }

    public function getBtnTextAttribute()
    {
        return @$this->translate->btn_text;
    }

    public function getSliderBgImageAttribute()
    {
        if (config('app.demo_mode')) {
            return getFileLink('675x480', $this->bg_image);
        }

        if (addon_is_activated('ishopet')) {
            return getFileLink('726x350', $this->bg_image);
        }

        return getFileLink('675x480', $this->bg_image);
    }




}
