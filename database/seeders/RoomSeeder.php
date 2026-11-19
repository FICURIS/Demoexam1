<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::create([
            'title' => 'Главная аудитория',
            'description' => 'Просторная аудитория на 70 человек.',
            'type' => 'Аудитория',
            'price' => '15000.00',
            'image' => 'images/auditorium.jpg',
        ]);

        Room::create([
            'title' => 'Коворкинг',
            'description' => 'Уютное пространство для неформальных конференций.',
            'type' => 'Коворкинг',
            'price' => '8000.00',
            'image' => 'images/coworking.jpg',
        ]);

        Room::create([
            'title' => 'Кинозал',
            'description' => 'Большой зал с экраном и проектором.',
            'type' => 'Кинозал',
            'price' => '20000.00',
            'image' => 'images/cinema.jpg',
        ]);
    }
}
