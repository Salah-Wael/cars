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

                // Add the image path to the array (optional, in case you want to return it)
                $imagePaths.append($imagePath) ;
            }

        // Return an array of image paths, if needed
        return $imagePaths;
    }

    public static function deleteImage($imageName, string $pathAfterPublic)
    {
        File::delete(public_path($pathAfterPublic) . $imageName);
    }
}
