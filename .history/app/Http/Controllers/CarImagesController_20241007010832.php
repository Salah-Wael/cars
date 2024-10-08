<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarImagesController extends Controller
{
    public function showProductImages($productId)
    {
        $productImages = DB::table('product_images')->where('product_id', $productId)->get();
        $product = Car::find($productId);
        return view('product.product-images', compact('productImages', 'product'));
    }

    public function storeImages(Request $request, $productId)
    {

        $request->validate([
            'image_path.*' => 'image|mimes:jpeg,jpg,png,jfif,svg|max:5048',
        ]);

        if ($request->hasfile('image_path')) {
            $imagePath = ImageController::storeImage($request, 'image_path', 'assets/img/products/');
            // Save the file path in the database (assuming you have a ProductImage model)
            DB::table('product_images')->insert([
                'image_path' => $imagePath,
                'product_id' => $productId,
            ]);
        }

        return redirect()->route('product.show', $productId)->with('success', 'Images uploaded successfully.');
    }

    public function deleteImage($imageId)
    {

        $productImage = DB::table('product_images')->where('id', $imageId)->first();
        if ($productImage) {
            ImageController::deleteImage($productImage->image_path, 'assets/img/products/');
            $productId = $productImage->product_id;
            DB::table('product_images')->where('id', $imageId)->delete();
            return redirect()->route('product.show.images', compact('productId'))->with(['success' => "product's image deleted successfully"]);
        } else {
            return redirect()->route('error.404')->with(['message' => "product's image not found"]);
        }
    }
}
