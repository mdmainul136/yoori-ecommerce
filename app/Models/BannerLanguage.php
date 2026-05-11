<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerLanguage extends Model
{
    use HasFactory;
    protected $table = 'banner_languages';
    protected $fillable = [
         'banner_id', 'lang', 'title', 'sub_title', 'btn_text',
    ];

    public function banner()
    {
        return $this->belongsTo(Banner::class);
    }

}
