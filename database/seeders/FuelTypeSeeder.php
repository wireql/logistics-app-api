<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fuel_types')->insert([
            [
                "name" => "Дизель"
            ],
            [
                "name" => "Бензин"
            ],
            [
                "name" => "Электрический"
            ],
            [
                "name" => "Гибрид"
            ]
        ]);
    }
}
