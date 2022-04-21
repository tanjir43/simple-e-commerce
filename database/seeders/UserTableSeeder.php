<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //      Customer

        DB::table('users')->insert([
            [
                'full_name' => 'Tanjir Customer',
                'username'  => 'Customer',
                'email'     => 'customer@gmail.com',
                'password'  => Hash::make('56789'),
                'status'    => 'active',
            ],
        ]);
        //      Admin
        DB::table('admins')->insert([
            [
                'full_name' => 'Tanjir Admin',
                'email'     => 'admin@gmail.com',
                'password'  => Hash::make('56789'),
                'status'    => 'active',
            ],
        ]);
        //      Seller
        DB::table('sellers')->insert([
            [
                'full_name' => 'Mr. Seller',
                'username'  => 'Mr. Seller',
                'email'     => 'seller@gmail.com',
                'address'     => '16/6 garden road',
                'phone'     => '123456789',
                'photo'     => '',
                'password'  => Hash::make('56789'),
                'is_verified' => 0,
                'status'    => 'active',
            ],
        ]);
    }
}
