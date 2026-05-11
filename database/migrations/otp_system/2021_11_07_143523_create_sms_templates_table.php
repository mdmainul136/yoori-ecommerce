<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable("sms_templates")) {
            return;
        }
        Schema::create('sms_templates', function (Blueprint $table) {
            $table->id();
            $table->string('tab_key');
            $table->string('title');
            $table->tinyInteger('status');
            $table->integer('template_id')->comment('use only for fast2sms');
            $table->text('sms_body');
            $table->timestamps();
        });

        $now = now();

        $templates = [
            [
                'tab_key' => 'signup',
                'title' => 'Signup SMS',
                'status' => 1,
                'template_id' => 125,
                'sms_body' => 'Your phone number verification otp is {otp}',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'tab_key' => 'login',
                'title' => 'Login SMS',
                'status' => 1,
                'template_id' => 235,
                'sms_body' => 'Your login otp is {otp}',
                'created_at' => $now,
                'updated_at' => $now
            ]
        ];
        \App\Models\SmsTemplate::insert($templates);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sms_templates');
    }
}
