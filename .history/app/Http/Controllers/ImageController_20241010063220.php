<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function storeImages($request,  string $columnName)
    {

        if ($request->hasfile('image')) {
            $imagePath = ImageController::storeImage($request, 'image', 'assets/img/cars/');
            // Save the file path in the database (assuming you have a CarImage model)
            DB::table('car_images')->insert([
                'image' => $imagePath,
                'car_id' => $carId,
            ]);
        }

    }

    public static function deleteImage($imageName, string $pathAfterPublic)
    {
        File::delete(public_path($pathAfterPublic) . $imageName);
    }
}
