<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DefaultBsws extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB :: insert("INSERT INTO `bsws` (`system_word`, `word_ge`, `word_en`, `word_ru`, `created_at`, `updated_at`) VALUES
                    ('address', 'თბილისი', 'Tbilisi', 'Тбилиси', '2022-03-17 09:53:39', '2022-03-17 09:53:52');");
    }
}
