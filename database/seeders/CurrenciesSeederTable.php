<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrenciesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert(
            [
            [
                'name'   => 'USA Dollar',
                'symbol' => '$',
                'exchange_rate'=> 1,
                'code'  => 'Doll',
            ],
            [
                'name' => 'Taka',
                'symbol' => 'TK',
                'exchange_rate'=>85,
                'code'  =>'BDT'
            ]
                ]
        );
    }
}
