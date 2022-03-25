<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DefaultModulesIncludesValues extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB :: insert("INSERT INTO `modules_includes_values` (`module`, `include_in`, `created_at`, `updated_at`) VALUES
                    (14, 1, '2021-05-24 10:22:14', '2021-05-24 10:22:14'),
                    (14, 3, '2021-05-24 10:22:14', '2021-05-24 10:22:14'),
                    (1, 1, '2021-06-04 09:37:40', '2021-06-04 09:37:40'),
                    (1, 2, '2021-06-04 09:37:40', '2021-06-04 09:37:40')");
    }
}
