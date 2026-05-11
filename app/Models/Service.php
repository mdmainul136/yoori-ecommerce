<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['position'];

    protected $casts = [
        'image'            => 'array',
    ];

    public function currentLanguage(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ServiceLanguage::class)->where('lang',languageCheck());
    }

    public function getTranslateAttribute()
    {
        $lang = languageCheck();
        $row = $this->currentLanguage->where('lang',$lang)->first();
        if (!$row)
            $row = $this->currentLanguage->where('lang','en')->first();

        return $row;
    }

    public function getTitleAttribute()
    {
        return @$this->translate->title;
    }

    public function getSubTitleAttribute()
    {
        return @$this->translate->sub_title;
    }

    public function serviceLanguages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ServiceLanguage::class);
    }

    public function getTranslation($field, $lang = 'en')
    {
        $product_translation  = $this->serviceLanguages()->where('lang', $lang)->first();

        if (blank($product_translation)):
            $product_translation = $this->serviceLanguages()->where('lang', 'en')->first();
        endif;

        return $product_translation->$field;
    }

    public function getServiceImageAttribute()
    {
        $imageData = $this->image;

        if (!is_array($imageData) || !isset($imageData['images'])) {
            return static_asset('images/default/150X150.png');
        }

        $original = $imageData['images']['original_image'] ?? null;

        if ($original && Str::endsWith(strtolower($original), '.svg')) {
            return is_file_exists($original, $imageData['images']['storage'] ?? null)
                ? get_media($original, $imageData['images']['storage'] ?? null)
                : static_asset('images/default/default-image.svg');
        }

        return getFileLink('72x72', $imageData['images']);

    }
}
