<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Label;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Label::truncate();

        Label::factory()->createMany([
            ['name' => 'ошибка', 'description' => 'Какая-то ошибка в коде или проблема с функциональностью'],
            ['name' => 'документация', 'description' => 'Задача которая касается документации'],
            ['name' => 'дубликат', 'description' => 'Повтор другой задачи'],
            ['name' => 'доработка', 'description' => 'Новая фича, которую нужно запилить'],
        ]);
    }
}
