<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            [
                'name'                  => 'José da Silva Junior',
                'url'               => 'dsadasdasdasdasdasdsadasd',
                'price'             => 1.2,
                'description'    => 'Descrição de teste'
            ],
            [
                'name'                  => 'Carlos da ponte',
                'url'               => 'dsadasdasdasdasdasdsadasd2',
                'price'             => 1.5,
                'description'    => 'Descrição de teste 2'
            ]
        ]);
    }
}
