<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role_id' => 2,
            'surname' => 'Иванов',
            'name' => 'Иван',
            'middlename' => 'Иванович',
            'email' => 'admin@mail.ru',
            'phone' => '8(999)999-99-99',
            'login' => 'Conf2027',
            'password' => bcrypt('Demo77'),
        ]);
    }
}
