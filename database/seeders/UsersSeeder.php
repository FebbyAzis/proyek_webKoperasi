<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678')
            ]
            // [
            //     'name' => 'Febby Azis',
            //     'email' => 'febbyazis@gmail.com',
            //     'role' => 'user',
            //     'password' => bcrypt('12345678')
            // ],
            // [
            //     'name' => 'Nur Muhammad Yusuf Faishal',
            //     'email' => 'nurmuhammadyusuffaishal@gmail.com',
            //     'role' => 'user',
            //     'password' => bcrypt('12345678')
            // ]
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
