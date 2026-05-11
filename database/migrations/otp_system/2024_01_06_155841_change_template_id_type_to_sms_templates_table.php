<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ChangeTemplateIdTypeToSmsTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = "
                ALTER TABLE sms_templates
                MODIFY COLUMN template_id VARCHAR(191);
             ";
        DB::unprepared($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sms_templates', function (Blueprint $table) {
            //
        });
    }
}
