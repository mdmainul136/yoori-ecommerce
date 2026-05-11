<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarqueeLanguage extends Model
{
    use HasFactory;
    protected $table = 'marquee_languages';
    protected $fillable = [
        'marquee_id',
        'lang',
        'title',
    ];

    public function marquee()
    {
        return $this->belongsTo(Marquee::class);
    }

}
