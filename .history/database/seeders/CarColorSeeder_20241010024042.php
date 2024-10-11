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
            ['color' => 'Red'],
            ['color' => 'Blue'],
            ['color' => 'Green'],
            ['color' => 'Black'],
            ['color' => 'White'],
            ['color' => 'Silver'],
            ['color' => 'Yellow'],
            ['color' => 'Gray'],
            ['color' => 'Orange'],
            ['color' => 'Brown'],
        ];

        CarColor::insert($carColors);
    }
}
