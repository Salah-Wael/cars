<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        DB::table('car_colors')->insert($carColors);
    }
}
