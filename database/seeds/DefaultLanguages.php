<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DefaultLanguages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB :: insert("INSERT INTO `languages` (`title`, `full_title`, `disable`, `like_default`, `like_default_for_admin`, `rang`, `created_at`, `updated_at`) VALUES
                    ('ru', 'Ру', 0, 0, 0, 0, NULL, '2022-03-18 10:57:40'),
                    ('ge', 'ქა', 0, 1, 1, 10, NULL, '2022-03-18 10:57:40'),
                    ('en', 'En', 0, 0, 0, 5, '2021-01-15 14:23:35', '2022-03-18 10:57:40')");
    }
}
