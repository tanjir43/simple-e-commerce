<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // --home banner
        DB::table('banners')->insert([
            [
            'title' => 'Special offer',
            'slug'  => 'special-offer',
            'description' => 'Only $78',
            'photo'        => 'assets/images/banners/banner-fullwidth.jpg',
            'status'        => 'active',
            'conditions'     =>'banner'
                ]
        ]);


        DB::table('settings')->insert(
            [
            'title' => 'Obligate Gadgets',
            'meta_description'  => 'Obligate Gadgets',
            'meta_keywords'      => 'Online shopping',
            'logo'  => 'assets/images/demos/demo-4/logo.png',
            'favicon'   => '',
            'address'   => '16/6 Garden road',
            'email'     => 'obligateGadgets@gmail.com',
            'fax'       => '002 003 004 005 006',
            'footer'    => 'obligate gadgets',
            'phone'     => '0123456789',
            'facebook_url'  => '',
            'twitter_url'   => '',
            'linkedin_url'  => '',
            'pinterest_url' => '',
        ]
        );
    }
}
