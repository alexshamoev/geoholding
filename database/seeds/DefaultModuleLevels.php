<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DefaultModuleLevels extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB :: insert("INSERT INTO `module_levels` (`id`, `top_level`, `title`, `rang`, `created_at`, `updated_at`) VALUES
                    (3, 16, '0', 15, '2022-04-12 12:32:48', '2022-04-14 06:56:06'),
                    (4, 16, '1', 10, '2022-04-12 12:42:24', '2022-04-14 06:56:16'),
                    (5, 7, '0', 20, '2022-04-15 13:30:36', '2022-04-15 13:30:41'),
                    (6, 7, '1', 10, '2022-04-15 13:30:51', '2022-04-15 13:30:55')");
    }
}
