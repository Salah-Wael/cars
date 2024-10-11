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
            ['color_' => 'Red'],
            ['color_' => 'Blue'],
            ['color_' => 'Green'],
            ['color_' => 'Black'],
            ['color_' => 'White'],
            ['color_' => 'Silver'],
            ['color_' => 'Yellow'],
            ['color_' => 'Gray'],
            ['color_' => 'Orange'],
            ['color_' => 'Brown'],
        ];

        CarColor::insert($carColors);
    }
}
