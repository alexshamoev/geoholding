<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DefaultBscs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB :: insert("INSERT INTO `bscs` (`system_word`, `configuration`, `created_at`, `updated_at`) VALUES
                    ('admin_email', 'programmers@hobbystudio.ge', '2022-03-17 09:12:14', '2022-03-17 09:12:24'),
                    ('facebook_link', 'https://facebook.com', '2022-03-17 09:12:33', '2022-03-17 09:12:50'),
                    ('instagram_link', 'https://instagram.com\'', '2022-03-17 09:12:59', '2022-03-17 09:13:20'),
                    ('twitter_link', 'https://twitter.com', '2022-03-17 09:13:28', '2022-03-17 09:13:46'),
                    ('phone_number', '+995 000 00 00 00; +995 000 00 00 00', '2022-03-17 09:13:57', '2022-03-17 09:14:19'),
                    ('cordinate_x', '41.74353604308457', '2022-03-17 09:14:38', '2022-03-17 09:15:18'),
                    ('cordinate_y', '44.73493873215938', '2022-03-17 09:15:19', '2022-03-17 09:15:29'),
                    ('map_number', '17', '2022-03-17 09:15:31', '2022-03-17 09:16:15')");
    }
}
