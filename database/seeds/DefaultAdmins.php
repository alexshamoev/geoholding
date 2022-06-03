<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DefaultAdmins extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('1234');

        DB :: insert("INSERT INTO `admins` (`name`, `email`, `email_verified_at`, `password`, `super_administrator`, `created_at`, `updated_at`) VALUES
                    ('superadmin', 'superadmin@gmail.com', NULL, '$password', 1, '2021-06-16 10:21:55', '2022-03-17 08:02:24')");
    }
}
