<?php

// use App\Models\Permission;
// use App\Models\Setting;
// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Schema;

// class AddUpdateTo160Table extends Migration
// {
//     /**
//      * Run the migrations.
//      *
//      * @return void
//      */
//     public function up()
//     {
//          $sql = "   ALTER TABLE products
//                 MODIFY COLUMN rating double default 0.00;";
//         DB::unprepared($sql);

//         $cities_sql = "   ALTER TABLE cities
//                 MODIFY COLUMN cost double default 0.00";
//         DB::unprepared($cities_sql);



//         Schema::table('users', function (Blueprint $table) {
//             if (Schema::hasColumn('users', 'currency_id')) {
//                 $table->dropColumn('currency_id');
//             }
//             $table->string('currency_code')->nullable()->after('firebase_auth_id')->default('USD');
//         });

//     }

//     public function down()
//     {
//         Schema::table('155', function (Blueprint $table) {
//             //
//         });
//     }
// }







use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddUpdateTo160Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Modify 'rating' column in 'products' table
        DB::unprepared("ALTER TABLE products MODIFY COLUMN rating double default 0.00;");

        // Modify 'cost' column in 'cities' table
        DB::unprepared("ALTER TABLE cities MODIFY COLUMN cost double default 0.00;");

        // Drop 'currency_id' column if it exists
        if (Schema::hasColumn('users', 'currency_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('currency_id');
            });
        }

        // Add 'currency_code' column if it doesn't exist
        if (!Schema::hasColumn('users', 'currency_code')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('currency_code', 191)
                      ->nullable()
                      ->default('USD')
                      ->after('firebase_auth_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop 'currency_code' column if it exists
        if (Schema::hasColumn('users', 'currency_code')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('currency_code');
            });
        }

        // Re-add 'currency_id' column
        if (!Schema::hasColumn('users', 'currency_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->unsignedBigInteger('currency_id')->nullable()->after('firebase_auth_id');
            });
        }

        // Revert 'rating' column modification in 'products' table
        DB::unprepared("ALTER TABLE products MODIFY COLUMN rating double;");

        // Revert 'cost' column modification in 'cities' table
        DB::unprepared("ALTER TABLE cities MODIFY COLUMN cost double;");
    }
}
