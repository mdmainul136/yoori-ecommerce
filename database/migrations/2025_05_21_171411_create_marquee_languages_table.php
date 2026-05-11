<?php

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
        Schema::create('marquee_languages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('marquee_id');
            $table->string('lang',10)->index()->comment('our default locale for system en');
            $table->string('title')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marquee_languages');
    }
};
