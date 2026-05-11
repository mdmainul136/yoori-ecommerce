<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marquee extends Model
{
    use HasFactory;
    protected $table = 'marquees';
    protected $fillable = [
        'link',
        'title'
    ];


    protected $appends = ['title'];

    public function marqueeLanguages()
    {
        return $this->hasMany(MarqueeLanguage::class)->orderBy('title');
    }

    public function currentLanguage(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(MarqueeLanguage::class);
    }


    public function getTranslateAttribute()
    {
        $lang = languageCheck();
        $row = $this->currentLanguage->where('marquee_id', $this->id)->where('lang', $lang)->first();
        if (!$row)
            $row = $this->currentLanguage->where('marquee_id', $this->id)->where('lang', 'en')->first();

        return $row;
    }


    public function getTranslation($field, $lang = 'en')
    {
        $marquee_translation  = $this->hasMany(MarqueeLanguage::class)->where('lang', $lang)->first();

        if (blank($marquee_translation)):
            $marquee_translation = $this->hasMany(MarqueeLanguage::class)->where('lang', 'en')->first();
        endif;

        return $marquee_translation->$field;
    }



    public function getTitleAttribute()
    {
        return @$this->translate->title;
    }
}
