<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DefaultMenuButtonsStep0 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB :: insert("INSERT INTO `menu_buttons_step_0` (`title_ge`, `title_en`, `title_ru`, `page_id`, `created_at`, `updated_at`, `rang`, `free_link_ge`, `free_link_en`, `free_link_ru`, `link_type`, `module_step`, `open_in_new_tab`) VALUES
                    ('ჩვენს შესახებ', 'About Us', 'О Нас', 1, NULL, NULL, 15, '', '', '', 'page', 0, 0),
                    ('კონტაქტი', 'Contact', 'Контакты', 2, NULL, NULL, 0, '', '', '', 'page', 0, 0),
                    ('მთავარი', 'Home', 'Главная', 3, NULL, NULL, 20, '', '', '', 'page', 0, 0),
                    ('სიახლეები', 'News', 'Новости', 4, NULL, NULL, 10, '', '', '', 'page', 0, 0),
                    ('ფოტო გალერეა', 'Photo Gallery', 'Фото Галерея', 7, NULL, NULL, 5, '', '', '', 'page', 0, 0)");
    }
}
