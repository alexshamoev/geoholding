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
        DB :: insert("INSERT INTO `modules` (`include_type`, `alias`, `title`, `page_id`, `hide_for_admin`, `icon_bg_color`, `rang`, `created_at`, `updated_at`) VALUES
                    (2, 'news', 'სიახლეები', 4, 0, '#aabbaa', 5, NULL, '2021-06-04 09:37:40'),
                    (0, 'photo_gallery', 'ფოტო გალერეა', 7, 0, '#9929bd', 15, '2021-01-02 15:39:38', '2022-03-11 07:11:17'),
                    (2, 'partners', 'პარტნიორები', 0, 1, '#d39d00', 10, '2021-01-17 16:57:15', '2021-05-24 10:22:14'),
                    (4, 'pages', 'გვერდები', 0, 0, '#669d34', 20, '2021-04-16 09:14:00', '2022-03-03 15:09:25'),
                    (1, 'menu_buttons', 'ღილაკების მენიუ', 0, 0, '#e32400', 0, '2021-05-03 07:13:02', '2021-05-07 08:05:05'),
                    (1, 'header', 'Header', 0, 1, '#4d22b4', 5, '2021-06-09 11:00:03', '2022-01-14 06:02:20'),
                    (1, 'footer', 'Footer', 0, 1, '#c4bc00', 0, '2021-06-09 11:06:05', '2022-01-14 06:02:11'),
                    (0, 'contacts', 'კონტაქტი', 2, 0, '#5e30eb', 0, '2022-01-14 05:20:51', '2022-03-11 07:19:04'),
                    (4, 'admins', 'ადმინები', 0, 0, '#d58400', 0, '2022-01-21 08:37:41', '2022-01-21 08:38:21'),
                    (4, 'users', 'რეგისტრირებული მომხმარებლები', 0, 0, '#fec700', 0, '2022-01-25 10:46:39', '2022-01-25 10:47:03'),
                    (0, 'home', 'მთავარი', 3, 1, '#ffa57d', 0, '2022-03-11 12:27:45', '2022-03-11 12:47:24')");
    }
}
