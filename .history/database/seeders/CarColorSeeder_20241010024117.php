<?php

namespace Database\Seeders;

use App\Models\CarColor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carColors = [
            ['color_name' => 'Red'],
            ['color_name' => 'Blue'],
            ['color_name' => 'Green'],
            ['color_name' => 'Black'],
            ['color_name' => 'White'],
            ['color_name' => 'Silver'],
            ['color_name' => 'Yellow'],
            ['color_name' => 'Gray'],
            ['color_name' => 'Orange'],
            ['color_name' => 'Brown'],
        ];

        CarColor::insert($carColors);
    }
}
