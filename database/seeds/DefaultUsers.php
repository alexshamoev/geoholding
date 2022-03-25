<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class DefaultUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('1234');

        DB :: insert("INSERT INTO `users` (`name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `super_administrator`, `admin`) VALUES
                    ('ალექსი', 'alexshamoev@gmail.com', NULL, '$password', NULL, '2021-06-16 10:21:55', '2022-03-17 08:02:24', 1, 1),
                    ('sandra', 'sandratbilisi@gmail.com', NULL, '$password', NULL, '2022-01-24 10:05:00', '2022-01-24 10:05:00', 0, 0)");
    }
}
