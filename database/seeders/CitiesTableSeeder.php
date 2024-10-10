<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class CitiesTableSeeder extends Seeder
{

     public function run()
    {

        if ($city) {
            DB::table('cities')->insert([
                'name' => $city,
            ]);
        }
    }
}
