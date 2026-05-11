<?php

use App\Models\BannerLanguage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('banner_languages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('banner_id');
            $table->string('lang',10)->index()->comment('our default locale for system en');
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('btn_text')->nullable();
            $table->timestamps();
        });

        $banners = \App\Models\Banner::all();
        foreach ($banners as $banner) {
            BannerLanguage::create([
                'banner_id' => $banner->id,
                'lang' => 'en',
                'title' => 'Title',
            ]);
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banner_languages');
    }
};
