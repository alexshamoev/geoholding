<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DefaultPagesStep1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB :: insert("INSERT INTO `pages_step_1` (`id`, `top_level`, `title_ge`, `title_en`, `title_ru`, `rang`, `meta_title_ge`, `meta_title_en`, `meta_title_ru`, `meta_description_ge`, `meta_description_en`, `meta_description_ru`, `created_at`, `updated_at`) VALUES
        (1, 24, '333', '33', '3', 20, '', '', '', '', '', '', NULL, NULL),
        (4, 0, 'ee', 'sdf', 'sdfg', 0, '', '', '', '', '', '', NULL, NULL),
        (5, 0, 'ee', 'sdf', 'sdfg', 0, '', '', '', '', '', '', NULL, NULL),
        (11, 24, '222', '222', 'sdfg', 15, '', '', '', '', '', '', NULL, NULL),
        (25, 0, '', '', '', 0, '', '', '', '', '', '', NULL, NULL),
        (26, 0, '', '', '', 0, '', '', '', '', '', '', NULL, NULL),
        (27, 0, '', '', '', 0, '', '', '', '', '', '', NULL, NULL),
        (28, 53, '', '', '', 0, '', '', '', '', '', '', NULL, NULL),
        (29, 53, '', '', '', 0, '', '', '', '', '', '', NULL, NULL),
        (31, 53, '', '', '', 0, '', '', '', '', '', '', NULL, NULL),
        (32, 54, '', '', '', 0, '', '', '', '', '', '', NULL, NULL),
        (33, 54, '', '', '', 0, '', '', '', '', '', '', NULL, NULL),
        (34, 24, '', '', '', 10, '', '', '', '', '', '', NULL, NULL),
        (35, 24, '', '', '', 5, '', '', '', '', '', '', NULL, NULL),
        (36, 24, '', '', '', 0, '', '', '', '', '', '', NULL, NULL),
        (37, 24, '', '', '', 0, '', '', '', '', '', '', NULL, NULL),
        (38, 54, '', '', '', 0, '', '', '', '', '', '', NULL, NULL),
        (39, 25, '', '', '', 0, '', '', '', '', '', '', NULL, NULL),
        (40, 59, '', '', '', 0, '', '', '', '', '', '', NULL, NULL),
        (41, 25, '', '', '', 0, '', '', '', '', '', '', NULL, NULL),
        (42, 25, '', '', '', 0, '', '', '', '', '', '', NULL, NULL),
        (43, 25, '', '', '', 0, '', '', '', '', '', '', NULL, NULL),
        (44, 25, '', '', '', 0, '', '', '', '', '', '', NULL, NULL),
        (45, 24, '', '', '', 0, '', '', '', '', '', '', NULL, NULL),
        (46, 24, '', '', '', 0, '', '', '', '', '', '', NULL, NULL),
        (50, 7, '', '', '', 25, '', '', '', '', '', '', NULL, NULL),
        (51, 7, '', '', '', 30, '', '', '', '', '', '', NULL, NULL),
        (52, 7, '', '', '', 35, '', '', '', '', '', '', NULL, NULL),
        (53, 7, '', '', '', 40, '', '', '', '', '', '', NULL, NULL),
        (54, 7, '', '', '', 45, '', '', '', '', '', '', NULL, NULL),
        (55, 7, 'test', 'test', 'test', 50, '', '', '', '', '', '', NULL, NULL)");
    }
}
