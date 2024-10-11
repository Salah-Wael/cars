<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarColor;
use App\Models\CarManufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ImageController;

class CarController extends Controller
{
    public $carStatus = ['used', 'new', 'semi new'];

    public function create()
    {
        $carColors = CarColor::select('color_name as color')->get();
        $carTypes = CarManufacturer::select('manufacturer as type')->get();
        $carStatus = $this->carStatus;
        return view('car.create', compact('carColors', 'carTypes', 'carStatus'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'type' => 'required|string|max:255',
                'car_model' => 'required|string|max:255',
                'color' => 'required|string|max:255',
                'plate' => 'nullable|string|min:5|max:10|unique:cars,plate',
                'status' => 'required|string|in:used,new,semi_new',
                'description' => 'nullable|string',
                'price' => 'required|numeric',
                'image.*' => 'required|image|mimes:jpeg,jpg,png,webp,svg|max:5048',
            ],
            #errors
            [
                'image.image' => "The file field must be an image.",
                'image.mimes' => "The file field must be an image with extension jpeg, jpg, png, webp, or svg.",
            ]
        );

        dd($request);

        // Store the image and retrieve the path
        $carImagePath = ImageController::storeImage($request, 'image', 'assets/img/cars/');

        // Create a new Car record using mass assignment
        $car = Car::create([
            'type' => $request->type,
            'description' => $request->description,
            'car_model' => $request->car_model,
            'color' => $request->color,
            'plate' => $request->plate,
            'status' => $request->status,
            'price' => $request->price,
            'user_id' => Auth::user()->id,
            'image' => $carImagePath,
        ]);

        if (Auth::user()->role == 'admin') {
            $car->update([
                'post_status' => 1,
            ]);
        }

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

        // $qrCode = QrCode::size(300)->generate('https://sala7.great-site.net/product/' . $carId);

        return view('car.show', compact('car', 'related', 'carImages', 'qrCode'));
    }

    public function index()
    {
        $cars = Car::orderby('created_at', 'desc')->paginate(30);

        return view('car.index', compact('cars'));
    }
    public function carsTable()
    {
        $cars = Car::get();

        return view('car.cars-table', compact('cars'));
    }

    public function edit($id)
    {
        $car = Car::find($id);
        if ($car) {
            return view('car.edit', compact('car'));
        }

        // Return custom 404 view if cars is not found
        return view('error.404')->with(['message' => 'Car ID not found']);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'type' => 'required|string|max:255',
                'description' => 'string',
                'price' => 'required|numeric',
                'image' => 'image|mimes:jpeg,jpg,png,webp,svg|max:5048',
                'car_model' => 'string|max:255',
                'color' => 'required|string|max:255',
                'plate' => 'required|string|min:5|max:10',
                'status' => 'required|string|min:5|max:10',
            ],
            #errors
            [
                'image.image' => "The file field must be an image.",
                'image.mimes' => "The file field must be an image with extension jpeg, jpg, png, webp, or svg.",
            ]
        );

        $car = Car::find($id);
        if ($car) {

            $car->type = $request->type;
            $car->description = $request->description;
            $car->status = $request->status;
            $car->car_model = $request->car_model;
            $car->price = $request->price;
            $car->color = $request->color;
            $car->plate = $request->plate;

            if ($request->hasFile('image')) {
                ImageController::deleteImage($request->image, 'assets/img/cars/');
                $car->image = ImageController::storeImage($request, 'image_path', 'assets/img/cars/');
            }

            $car->updated_at = now();

            $car->save();

            return redirect()->route('car.index')->with(['message' => 'Car updated successfully']);
        }
    }

    public function delete($id)
    {
        $car = Car::find($id);
        if ($car) {
            ImageController::deleteImage($car->image, 'assets/img/car/');
            $car->delete();
            return redirect()->route('car.index')->with(['message' => 'Car deleted successfully']);
        }

        // Return custom 404 view if car is not found
        return view('error.404')->with(['message' => 'Car ID not found']);
    }

}
