<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seeders = [
            [
                'name' => 'Антонова Нелли Александровна',
                'email' => 'zxc@zxc.ru',
                'password' => 'qweqweqwe'
            ],
            ['name' => 'Лебедев Аким Дмитриевич'],
            ['name' => 'Суханов Сергей Дмитриевич'],
            ['name' => 'Некрасова Кристина Борисовна'],
            ['name' => 'Полина Евгеньевна Комарова'],
            ['name' => 'Юдина Галина Владимировна'],
            ['name' => 'Любовь Андреевна Некрасова'],
            ['name' => 'Виктор Андреевич Соловьёв'],
            ['name' => 'Розалина Фёдоровна Красильникова'],
            ['name' => 'Овчинников Нестор Романович'],
            ['name' => 'Борис Алексеевич Моисеев'],
            ['name' => 'Сава Максимович Фёдоров'],
            ['name' => 'Иван Владимирович Зверев'],
            ['name' => 'Сергей Геннадьевич Безруков'],
            ['name' => 'Владимир Владимирович Галкин'],
            ['name' => 'Павел Анатольевич Максимов'],
        ];

        User::factory()
            ->count(count($seeders))
            ->sequence(...$seeders)
            ->create();
    }
}
