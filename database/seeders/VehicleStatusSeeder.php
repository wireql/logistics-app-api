<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vehicle_statuses')->insert([
            [
                "name" => "Свободен"
            ],
            [
                "name" => "В задании"
            ],
            [
                "name" => "Ожидает ТО"
            ],
            [
                "name" => "На ремонте"
            ]
        ]);
    }
}
