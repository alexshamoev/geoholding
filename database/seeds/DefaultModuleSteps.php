<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DefaultModuleSteps extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB :: insert("INSERT INTO `module_steps` (`id`, `top_level`, `title`, `db_table`, `images`, `possibility_to_add`, `possibility_to_delete`, `possibility_to_rang`, `possibility_to_edit`, `possibility_to_multy_delete`, `blocks_max_number`, `rang`, `created_at`, `updated_at`, `parent_step_id`, `main_column`, `order_by_column`, `order_by_sequence`, `model_name`) VALUES
        (2, 7, 'კატეგორია', 'photo_gallery_step_0', 0, 1, 1, 1, 1, 0, 0, 0, '2021-01-02 12:48:50', '2022-06-17 04:28:23', 0, 'title_ge', 'rang', 'DESC', 'PhotoGalleryStep0'),
        (28, 1, 'კატეგორია', 'news_step_0', 0, 1, 1, 0, 1, 0, 1, 10, '2021-01-22 11:29:52', '2022-06-09 06:01:35', 0, 'title_ge', 'rang', 'DESC', 'NewsStep0'),
        (29, 1, 'ქვე-კატეგორია', 'news_step_1', 1, 1, 1, 0, 1, 0, 1, 5, '2021-01-22 12:29:15', '2022-06-08 10:08:12', 28, 'title_ge', 'rang', 'DESC', 'NewsStep1'),
        (30, 1, 'სიახლე', 'news_step_2', 1, 1, 1, 0, 1, 0, 1, 0, '2021-01-22 12:29:37', '2022-06-08 10:08:20', 29, 'title_ge', 'rang', 'DESC', 'NewsStep2'),
        (31, 14, 'პარტნიორი', 'partners_step_0', 1, 1, 1, 1, 1, 0, 1, 0, '2021-03-19 03:59:03', '2022-06-16 10:16:11', 0, 'title_ge', 'rang', 'DESC', 'Partner'),
        (32, 16, 'მენიუს ღილაკი', 'menu_buttons_step_0', 0, 1, 1, 1, 1, 0, 1, 0, '2021-05-07 03:36:36', '2022-06-13 12:13:55', 0, 'title_ge', 'rang', 'DESC', 'MenuButtonStep0'),
        (33, 1, 'ფოტო', 'news_step_3', 1, 1, 1, 0, 1, 0, 1, 0, '2021-05-28 05:32:18', '2022-06-08 10:08:27', 30, 'title_ge', 'rang', 'DESC', 'NewsStep3'),
        (34, 7, 'ფოტო', 'photo_gallery_step_1', 1, 1, 1, 1, 1, 0, 0, 0, '2021-11-17 06:30:01', '2022-06-17 04:28:45', 0, 'title_ge', 'rang', 'DESC', 'PhotoGalleryStep0'),
        (35, 16, 'ქვე-მენიუს ღილაკი', 'menu_buttons_step_1', 0, 1, 1, 1, 1, 0, 1, 0, '2021-12-13 12:02:11', '2022-05-19 07:49:47', 32, 'title_ge', 'rang', 'DESC', 'MenuButtonStep1'),
        (55, 15, 'გვერდი', 'pages_step_0', 0, 1, 1, 1, 1, 0, 0, 10, '2022-04-25 12:34:52', '2022-06-17 04:09:40', 0, 'title_ge', 'id', 'DESC', 'Page'),
        (67, 43, 'კატეგორია', 'products_step_0', 0, 1, 1, 1, 1, 0, 1, 0, '2022-05-25 06:39:12', '2022-05-26 03:21:47', 0, 'title_ge', 'rang', 'DESC', 'ProductStep0'),
        (68, 43, 'ქვე-კატეგორია', 'products_step_1', 0, 1, 1, 1, 1, 0, 1, 0, '2022-05-25 07:06:24', '2022-05-25 07:06:24', 67, 'title_ge', 'rang', 'DESC', 'ProductStep1'),
        (69, 43, 'პროდუქტი', 'products_step_2', 0, 1, 1, 1, 1, 0, 1, 0, '2022-05-25 07:14:04', '2022-05-25 07:14:04', 68, 'title_ge', 'rang', 'DESC', 'ProductStep2'),
        (70, 43, 'ფოტოები', 'products_step_3', 1, 1, 1, 1, 1, 0, 1, 0, '2022-05-25 08:07:29', '2022-05-25 08:07:29', 69, 'id', 'rang', 'DESC', 'ProductStep3'),
        (71, 43, 'პროდუქტის პარამეტრები', 'products_step_4', 0, 1, 1, 1, 1, 0, 1, 0, '2022-05-25 08:11:13', '2022-05-25 08:11:13', 69, 'title_ge', 'rang', 'DESC', 'ProductStep4')");
    }
}
