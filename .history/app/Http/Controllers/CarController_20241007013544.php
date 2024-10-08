<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ImageController;

class CarController extends Controller
{
    public function create()
    {
        return view('car.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'car_model' => 'required|string|max:255',
                'color' => 'required|string|max:255',
                'plate' => 'required|string|min:5|max:10',
                'status' => 'required|string|min:5|max:10',
                'description' => 'string',
                'price' => 'required|numeric',
                'image' => 'required|image|mimes:jpeg,jpg,png,jfif,svg|max:5048',
            ],
            #errors
            [
                'image.image' => "The file field must be an image.",
                'image.mimes' => "The file field must be an image with extension jpeg, jpg, png, jfif, or svg.",
            ]
        );

        $car = new Car();
        $car->name = $request->name;
        $car->description = $request->description;
        $car->car_model = $request->car_model;
        $car->color = $request->color;
        $car->plate = $request->plate;
        $car->status = $request->status;
        $car->price = $request->price;
        $car->user_id = $request->user_id;
        $car->image = ImageController::storeImage($request, 'image', 'assets/img/cars/');
        $car->save();
        return redirect()->route('car.index')->with(['message' => 'Car added successfully']);
    }

    public function show($carId)
    {

        $carImages = DB::table('car_images')->where('car_id', $carId)->limit(9)->get();

        $car = Car::findOr($carId, function () {
            return view('error.404')->with(['message' => 'Car ID not found']);
        });

        $priceRangePercentage = 0.20;
        $minPrice = $car->price * (1 - $priceRangePercentage);
        $maxPrice = $car->price * (1 + $priceRangePercentage);

        $related = Car::where('id', '!=', $carId)
            ->whereBetween('price', [$minPrice, $maxPrice])
            ->orderBy('price', 'desc')
            ->get();

        $qrCode = QrCode::size(300)->generate('https://sala7.great-site.net/product/' . $carId);

        return view('product.show', compact('product', 'related', 'productImages', 'qrCode'));
    }

    public function getProductsByCategory(String $category)
    {
        $cars = Car::where('category_name', $category)->orderby('created_at', 'desc')->paginate(21);

        return view('product.index')->with(['car' => $products, 'categories' => $categories]);
    }

    public function index()
    {
        $categories = CategoryController::getAllCategories();
        $products = Product::orderby('created_at', 'desc')->paginate(30);

        return view('product.index', compact('products', 'categories'));
    }
    public function productsTable()
    {
        $products = Product::all();

        return view('product.products-table', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        if ($product) {
            $categories = Category::where('name', '!=', $product->category_name)->get(['name']);
            return view('product.edit', compact('product', 'categories'));
        }

        // Return custom 404 view if product is not found
        return view('error.404')->with(['message' => 'Product ID not found']);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'description' => 'string',
                'price' => 'required|numeric',
                'quantity' => 'required|integer',
                'image_path' => 'image|mimes:jpeg,jpg,png,jfif,svg|max:5048',
                'category_name' => 'required|string|max:255',
            ],
            #errors
            [
                'image_path.image' => "The file field must be an image.",
                'image_path.mimes' => "The file field must be an image with extension jpeg, jpg, png, jfif, or svg.",
            ]
        );

        $product = Product::find($id);
        if ($product) {

            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->category_name = $request->category_name;

            if ($request->hasFile('image_path')) {
                ImageController::deleteImage($request->image_path, 'assets/img/products/');
                $product->image_path = ImageController::storeImage($request, 'image_path', 'assets/img/products/');
            }

            $product->updated_at = now();

            $product->save();

            return redirect()->route('product.index')->with(['message' => 'Product updated successfully']);
        }
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if ($product) {
            ImageController::deleteImage($product->image_path, 'assets/img/products/');
            $product->delete();
            return redirect()->route('product.index')->with(['message' => 'Product deleted successfully']);
        }

        // Return custom 404 view if product is not found
        return view('error.404')->with(['message' => 'Product ID not found']);
    }

}
