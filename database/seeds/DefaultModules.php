<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DefaultModules extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB :: insert("INSERT INTO `modules` (`id`, `include_type`, `alias`, `title`, `page_id`, `hide_for_admin`, `icon_bg_color`, `rang`, `created_at`, `updated_at`) VALUES
                    (1, 2, 'news', 'სიახლეები', 4, 1, '#aabbaa', 5, NULL, '2022-01-24 09:48:14'),
                    (7, 0, 'photo_gallery', 'ფოტო გალერეა', 7, 0, '#9929bd', 15, '2021-01-02 15:39:38', '2021-05-07 08:04:57'),
                    (14, 2, 'partners', 'პარტნიორები', 0, 0, '#d39d00', 10, '2021-01-17 16:57:15', '2022-01-13 03:53:16'),
                    (15, 4, 'pages', 'გვერდები', 0, 0, '#669d34', 20, '2021-04-16 09:14:00', '2022-01-19 06:07:24'),
                    (16, 1, 'menu_buttons', 'ღილაკების მენიუ', 0, 0, '#e32400', 0, '2021-05-03 07:13:02', '2021-05-07 08:05:05'),
                    (17, 1, 'header', 'header', 0, 1, '#4d22b4', 5, '2021-06-09 11:00:03', '2022-01-24 10:01:58'),
                    (18, 1, 'footer', 'footer', 0, 1, '#c4bc00', 0, '2021-06-09 11:06:05', '2022-01-24 10:01:45'),
                    (21, 0, 'contacts', 'კონტაქტი', 2, 0, '#7a36ce', 0, '2022-01-12 07:12:32', '2022-01-26 10:26:46'),
                    (40, 4, 'admins', 'admins', 0, 0, '#c88f14', 0, '2022-01-24 08:09:14', '2022-01-24 10:05:17'),
                    (41, 4, 'users', 'მომხმარებლები', 0, 0, '#000000', 0, '2022-01-24 11:18:28', '2022-01-24 11:22:46')");
    }
}
