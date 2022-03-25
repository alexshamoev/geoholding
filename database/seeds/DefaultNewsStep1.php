<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DefaultNewsStep1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_step_1')->insert([

            [
                'parent' => 1,
                'alias_ge' => Str::random(10),
                'alias_en' => Str::random(10),
                'alias_ru' => Str::random(10),
                'title_ge' => Str::random(10),
                'title_en' => Str::random(10),
                'title_ru' => Str::random(10),
                'text_ge' => Str::random(50),
                'text_en' => Str::random(50),
                'text_ru' => Str::random(50),
                'rang' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'parent' => 2,
                'alias_ge' => Str::random(10),
                'alias_en' => Str::random(10),
                'alias_ru' => Str::random(10),
                'title_ge' => Str::random(10),
                'title_en' => Str::random(10),
                'title_ru' => Str::random(10),
                'text_ge' => Str::random(50),
                'text_en' => Str::random(50),
                'text_ru' => Str::random(50),
                'rang' => 10,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'parent' => 3,
                'alias_ge' => Str::random(10),
                'alias_en' => Str::random(10),
                'alias_ru' => Str::random(10),
                'title_ge' => Str::random(10),
                'title_en' => Str::random(10),
                'title_ru' => Str::random(10),
                'text_ge' => Str::random(50),
                'text_en' => Str::random(50),
                'text_ru' => Str::random(50),
                'rang' => 15,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]

        ]);    
    }
}
