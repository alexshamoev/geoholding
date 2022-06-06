<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DefaultProductsStep4 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products_step_4')->insert([

            [
                'top_level' => 1,
                'title_ge' => Str::random(10),
                'title_en' => Str::random(10),
                'title_ru' => Str::random(10),
                'rang' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'top_level' => 1,
                'title_ge' => Str::random(10),
                'title_en' => Str::random(10),
                'title_ru' => Str::random(10),
                'rang' => 10,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'top_level' => 1,
                'title_ge' => Str::random(10),
                'title_en' => Str::random(10),
                'title_ru' => Str::random(10),
                'rang' => 15,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]

        ]);    
    }
}
