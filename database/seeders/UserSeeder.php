<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'first_name' => 'Eko',
                'last_name' => 'Khannedy',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('12345678')
            ],
            [
                'first_name' => 'Eko',
                'last_name' => 'Khannedy',
                'email' => 'user@gmail.com',
                'role' => 'user',
                'password' => bcrypt('12345678')
            ],
        ];

        User::insert($users);
    }
}
