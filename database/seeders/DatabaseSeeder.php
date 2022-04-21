<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(CurrenciesSeederTable::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(AboutusSeederTable::class);
         \App\Models\User::factory(20)->create();
         \App\Models\Category::factory(20)->create();
         \App\Models\Brand::factory(20)->create();
         \App\Models\Product::factory(500)->create();
    }
}


