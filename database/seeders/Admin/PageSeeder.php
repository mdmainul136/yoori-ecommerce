<?php

namespace Database\Seeders\Admin;

use App\Models\Page;
use App\Models\PageLanguage;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Page::updateOrCreate(['type'=> 'home_page','slug' => 'home_page','link' => 'https://onno.spagreen.net/demo/']);
        Page::updateOrCreate(['type'=> 'seller_policy_pages','link' => 'seller-policy']);
        Page::updateOrCreate(['type'=> 'refund_policy_page','link' => 'refund-policy']);
        Page::updateOrCreate(['type'=> 'support_policy_page','link' => 'support-policy']);
        Page::updateOrCreate(['type'=> 'term_conditions_page','link' => 'terms-conditions']);
        Page::updateOrCreate(['type'=> 'privacy_policy_page','link' => 'privacy-policy']);
        Page::updateOrCreate(['type'=> 'about_us_page','link' => 'about']);
        Page::updateOrCreate(['type'=> 'contact_us_page','link' => 'contact','email' => 'almahmud400188@gmail.com','optional_email' => 'almahmud400188@gmail.com','phone' => '+01264479846646','optional_phone' => '+01264479846646']);

//        PageLanguage::updateOrCreate(['page_id'=> 1,'lang' => 'en','title' => 'Home Page']);
        PageLanguage::updateOrCreate(['page_id'=> 1,'lang' => 'en','title' => 'Seller Policy']);
        PageLanguage::updateOrCreate(['page_id'=> 2,'lang' => 'en','title' => 'Refund Policy']);
        PageLanguage::updateOrCreate(['page_id'=> 3,'lang' => 'en','title' => 'Support Policy']);
        PageLanguage::updateOrCreate(['page_id'=> 4,'lang' => 'en','title' => 'Term and Conditions']);
        PageLanguage::updateOrCreate(['page_id'=> 5,'lang' => 'en','title' => 'Privacy Policy']);
        PageLanguage::updateOrCreate(['page_id'=> 6,'lang' => 'en','title' => 'About Us']);
        PageLanguage::updateOrCreate(['page_id'=> 7,'lang' => 'en','title' => 'Contact Us','address' => 'Concord lake city,Khilkhet,Dhaka']);
    }
}
