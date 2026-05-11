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
        Schema::table('pages', function (Blueprint $table) {

            if(!Schema::hasColumn('pages','main_banner')){
                $table->string('main_banner')->nullable();
            }


            if(!Schema::hasColumn('pages','banner_1')){
                $table->string('banner_1')->nullable();
            }

            if(!Schema::hasColumn('pages','banner_2')){
                $table->string('banner_2')->nullable();
            }


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            if(Schema::hasColumn('pages','main_banner')){
                $table->dropColumn('main_banner');
            }

            if(!Schema::hasColumn('pages','banner_1')){
                $table->dropColumn('banner_1');
            }

            if(!Schema::hasColumn('pages','banner_2')){
                $table->dropColumn('banner_2');
            }
        });
    }
};
