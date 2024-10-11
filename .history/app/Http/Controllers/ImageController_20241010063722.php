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

    public static function storeImages($request, string $columnName, string $pathAfterPublic, $relatedId)
    {
        $imagePaths = [];

            foreach ($request->file($columnName) as $imageFile) {
                // For each image, call the storeImage method
                $imagePath = self::storeImage(new \Illuminate\Http\Request([$columnName => $imageFile]), $columnName, $pathAfterPublic);

                // Optionally, save the image path to a database or associate it with a related entity
                DB::table('car_images')->insert([
                    'related_id' => $relatedId, // Assuming this stores the ID of the related entity (e.g., car)
                    'image_path' => $imagePath,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Add the image path to the array (optional, in case you want to return it)
                $imagePaths[] = $imagePath;
            }

        // Return an array of image paths, if needed
        return $imagePaths;
    }

    public static function deleteImage($imageName, string $pathAfterPublic)
    {
        File::delete(public_path($pathAfterPublic) . $imageName);
    }
}
