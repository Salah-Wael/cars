<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the list of car manufacturers
        $carManufacturers = [
            ['manufacturer' => 'Volvo'],
            ['manufacturer' => 'Volkswagen'],
            ['manufacturer' => 'Toyota'],
            ['manufacturer' => 'Tesla'],
            ['manufacturer' => 'Subaru'],
            ['manufacturer' => 'Saturn'],
            ['manufacturer' => 'Rover'],
            ['manufacturer' => 'Ram'],
            ['manufacturer' => 'Porsche'],
            ['manufacturer' => 'Pontiac'],
            ['manufacturer' => 'Nissan'],
            ['manufacturer' => 'Morgan'],
            ['manufacturer' => 'Mitsubishi'],
            ['manufacturer' => 'Mini'],
            ['manufacturer' => 'Mercury'],
            ['manufacturer' => 'Mercedes-Benz'],
            ['manufacturer' => 'Mazda'],
            ['manufacturer' => 'Lincoln'],
            ['manufacturer' => 'Lexus'],
            ['manufacturer' => 'Land Rover'],
            ['manufacturer' => 'Kia'],
            ['manufacturer' => 'Jeep'],
            ['manufacturer' => 'Jaguar'],
            ['manufacturer' => 'Infiniti'],
            ['manufacturer' => 'Hyundai'],
            ['manufacturer' => 'Honda'],
            ['manufacturer' => 'Harley-Davidson'],
            ['manufacturer' => 'GMC'],
            ['manufacturer' => 'GA'],
            ['manufacturer' => 'Ford'],
            ['manufacturer' => 'FL'],
            ['manufacturer' => 'Fiat'],
            ['manufacturer' => 'Ferrari'],
            ['manufacturer' => 'Dodge'],
            ['manufacturer' => 'DC'],
            ['manufacturer' => 'Datsun'],
            ['manufacturer' => 'Chrysler'],
            ['manufacturer' => 'Chevrolet'],
            ['manufacturer' => 'Cadillac'],
            ['manufacturer' => 'Buick'],
            ['manufacturer' => 'BMW'],
            ['manufacturer' => 'Audi'],
            ['manufacturer' => 'Aston Martin'],
            ['manufacturer' => 'Alfa Romeo'],
            ['manufacturer' => 'Acura'],
        ];

        // Insert the manufacturers into the database
        DB::table('car_manufacturers')->insert($carManufacturers);
    }
}
