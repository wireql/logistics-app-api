<?php

namespace Database\Seeders;

use App\Models\VehicleCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vehicle_categories')->insert([
            [
                "name" => "Фургон легкий"
            ],
            [
                "name" => "Грузовик"
            ],
            [
                "name" => "Фура"
            ],
            [
                "name" => "Автопоезд"
            ]
        ]);
    }
}
