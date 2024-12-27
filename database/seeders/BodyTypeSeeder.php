<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BodyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('body_types')->insert([
            [
                "name" => "Тент"
            ],
            [
                "name" => "Цельнометаллический"
            ],
            [
                "name" => "Рефрижератор"
            ],
            [
                "name" => "Бортовой"
            ],
            [
                "name" => "Площадка"
            ],
            [
                "name" => "Самосвал"
            ]
        ]);
    }
}
