<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarManufacturer;

class CarManufacturerController extends Controller
{
    // Display a listing of car manufacturers
    public function index()
    {
        // Fetch all car manufacturers
        $carManufacturers = CarManufacturer::all();

        // Return view with manufacturers data
        return view('car_manufacturers.index', compact('carManufacturers'));
    }

    // Show the form for creating a new car manufacturer
    public function create()
    {
        return view('car_manufacturers.create');
    }

    // Store a newly created car manufacturer in storage
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'manufacturer' => 'required|string|max:255|unique:car_manufacturers,manufacturer',
        ]);

        // Create new car manufacturer
        CarManufacturer::create([
            'manufacturer' => $request->manufacturer,
        ]);

        return redirect()->route('car_manufacturers.index')->with('success', 'Car manufacturer created successfully.');
    }

    // Show the form for editing the specified car manufacturer
    public function edit(CarManufacturer $carManufacturer)
    {
        return view('car_manufacturers.edit', compact('carManufacturer'));
    }

    // Update the specified car manufacturer in storage
    public function update(Request $request, CarManufacturer $carManufacturer)
    {
        // Validate input
        $request->validate([
            'manufacturer' => 'required|string|max:255|unique:car_manufacturers,manufacturer,' . $carManufacturer->id,
        ]);

        // Update car manufacturer
        $carManufacturer->update([
            'manufacturer' => ucwords(strtolower($request->manufacturer))
        ]);

        return redirect()->route('car_manufacturers.index')->with('success', 'Car manufacturer updated successfully.');
    }

    // Remove the specified car manufacturer from storage
    public function destroy(CarManufacturer $carManufacturer)
    {
        $carManufacturer->delete();

        return redirect()->route('car_manufacturers.index')->with('success', 'Car manufacturer deleted successfully.');
    }
}
