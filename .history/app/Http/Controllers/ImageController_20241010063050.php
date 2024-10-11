<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public static function storeImage($request, string $columnName, string $pathAfterPublic)
    {
        $image = $request->file($columnName);
        $imageName = uniqid() . $image->getClientOriginalName();
        $noSpacesString = str_replace(' ', '', $imageName);
        $image->move(public_path($pathAfterPublic), $noSpacesString);

        return $noSpacesString;
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

    public static function deleteImage($imageName, string $pathAfterPublic)
    {
        File::delete(public_path($pathAfterPublic) . $imageName);
    }
}
