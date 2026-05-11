<?php

namespace Database\Seeders\Admin;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::updateOrCreate(
            ['locale' => 'en'],
            [
                'name' => 'English',
                'flag' => 'images/flags/us.png',
                'text_direction' => 'ltr',
                'status' => 1
            ]
        );

        // আপনি চাইলে নিচের গুলোও আনকমেন্ট করে এইভাবে পরিবর্তন করতে পারেন:

        // Language::updateOrCreate(
        //     ['locale' => 'bn'],
        //     [
        //         'name'           => 'Bangla',
        //         'flag'           => 'images/flags/bd.png',
        //         'text_direction' => 'ltr',
        //         'status'         => 1
        //     ]
        // );

        // Language::updateOrCreate(
        //     ['locale' => 'ar'],
        //     [
        //         'name'           => 'Arabic',
        //         'flag'           => 'images/flags/sa.png',
        //         'text_direction' => 'rtl',
        //         'status'         => 1
        //     ]
        // );
    }
}
