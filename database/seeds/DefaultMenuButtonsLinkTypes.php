<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DefaultMenuButtonsLinkTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB :: insert("INSERT INTO `menu_buttons_link_types` (`title_ge`, `title_en`, `title_ru`, `option_value`, `rang`, `created_at`, `updated_at`) VALUES
                    ('მივაბათ გვერდი', 'Attach page', 'Прикрепить страницу', 'page', 20, NULL, NULL),
                    ('თავისუფალი ბმული', 'Free link', 'Свободная ссылка', 'free_link', 15, NULL, NULL),
                    ('ბმულის გარეშე', 'Without link', 'Без ссылки', 'without_link', 10, NULL, NULL)");
    }
}
