<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
                						status	user_id	created_at	updated_at

                'name' => 'required|string|max:255',
                'model' => 'required|string|max:255',
                'color' => 'required|string|max:255',
                'plate' => 'required|string|min:5|max:10',
                'plate' => 'required|string|min:5|max:10',
                'description' => 'string',
                'price' => 'required|numeric',
                'image' => 'required|image|mimes:jpeg,jpg,png,jfif,svg|max:5048',
                'category_name' => 'required|string|max:255',
            ],
            #errors
            [
                'image_path.image' => "The file field must be an image.",
                'image_path.mimes' => "The file field must be an image with extension jpeg, jpg, png, jfif, or svg.",
            ]
        );

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category_name = $request->category_name;
        $product->image_path = ImageController::storeImage($request, 'image_path', 'assets/img/products/');
        $product->save();
        return redirect()->route('product.index')->with(['message' => 'Product added successfully']);
    }

    public function show($productId)
    {

        $productImages = DB::table('product_images')->where('product_id', $productId)->limit(9)->get();

        $product = Product::findOr($productId, function () {
            return view('error.404')->with(['message' => 'Product ID not found']);
        });

        $priceRangePercentage = 0.20;
        $minPrice = $product->price * (1 - $priceRangePercentage);
        $maxPrice = $product->price * (1 + $priceRangePercentage);

        $related = Product::where('category_name', '=', $product->category_name)
            ->where('id', '!=', $productId)
            ->whereBetween('price', [$minPrice, $maxPrice])
            ->orderBy('price', 'desc')
            ->get();

        $qrCode = QrCode::size(300)->generate('https://sala7.great-site.net/product/' . $productId);

        return view('product.show', compact('product', 'related', 'productImages', 'qrCode'));
    }

    public function getProductsByCategory(String $category)
    {
        $categories = CategoryController::getAllCategories();
        $products = Product::where('category_name', $category)->orderby('created_at', 'desc')->paginate(21);

        return view('product.index')->with(['products' => $products, 'categories' => $categories]);
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
