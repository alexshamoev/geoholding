<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DefaultMenuButtonsStep1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB :: insert("INSERT INTO `menu_buttons_step_1` (`id`, `title_ge`, `title_en`, `title_ru`, `free_link_ge`, `free_link_en`, `free_link_ru`, `link_type`, `module_step`, `page_id`, `open_in_new_tab`, `top_level`, `rang`, `created_at`, `updated_at`) VALUES
        (1, 'ჩვენს შესახებ', 'About Us', 'О Нас', '', '', '', 'page', 0, 1, 0, 3, 0, NULL, NULL),
        (2, 'რეგისტრაცია', 'Registration', 'Регистрация', '', '', '', 'page', 0, 5, 0, 3, 0, NULL, NULL),
        (3, 'ფოტო გალერეა', 'Photo Gallery', 'Фото Галерея', '', '', '', 'page', 0, 7, 0, 4, 0, NULL, NULL)");
    }
}
