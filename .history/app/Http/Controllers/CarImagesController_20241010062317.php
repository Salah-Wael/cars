<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarImagesController extends Controller
{
    public function showCarImages($carId)
    {
        $carImages = DB::table('car_images')->where('car_id', $carId)->get();
        $car = Car::find($carId);
        return view('car.car-images', compact('carImages', 'car'));
    }

    public function storeImages(Request $request, $carId)
    {

        $request->validate([
            'image.*' => 'image|mimes:jpeg,jpg,png,webp,svg|max:5048',
        ]);

        if ($request->hasfile('image')) {
            $imagePath = ImageController::storeImage($request, 'image', 'assets/img/cars/');
            // Save the file path in the database (assuming you have a CarImage model)
            DB::table('car_images')->insert([
                'image' => $imagePath,
                'car_id' => $carId,
            ]);
        }

        return redirect()->route('car.show', $carId)->with('success', 'Images uploaded successfully.');
    }

    public function deleteImage($imageId)
    {

        $carImage = DB::table('car_images')->where('id', $imageId)->first();
        if ($carImage) {
            ImageController::deleteImage($carImage->image_path, 'assets/img/cars/');
            $carId = $carImage->car_id;
            DB::table('car_images')->where('id', $imageId)->delete();
            return redirect()->route('car.show.images', compact('carId'))->with(['success' => "Car's image deleted successfully"]);
        } else {
            return redirect()->route('error.404')->with(['message' => "Car's image not found"]);
        }
    }
}
