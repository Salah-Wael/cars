<?php

use App\Models\Car;
use App\Models\News;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarImagesController;
use App\Http\Controllers\CarManufacturerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $cars = Car::where('post_status', '=', 1)
        ->latest('updated_at')
        ->take(3)
        ->get();

    $newes = News::with('tags', 'user')
        ->latest('updated_at')
        ->take(3)
        ->get();

    // dd($news);

    // return view('dashboard')->with(['cars' => $cars, 'news' => $news]);
    return view('layouts.app')->with(['cars' => $cars, 'newes' => $newes]);
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::view('/error-404','error.404')->name('error.404');
Route::view('/error-401','error.401')->name('error.401');

Route::view('/services', 'services')->name('services');

Route::prefix('news')->controller(NewsController::class)->group(function () {
    Route::get('/create', 'create')->name('news.create')->middleware('checkrole:admin');
    Route::post('/store', 'store')->name('news.store')->middleware('checkrole:admin');
    Route::get('/show/{newsId}', 'show')->name('news.show');
    Route::get('/{search?}', 'index')->name('news.index')->middleware('checkrole:admin,user');
    Route::get('/{newsId}/edit', 'edit')->name('news.edit')->middleware('checkrole:admin');
    Route::put('/{newsId}/update', 'update')->name('news.update')->middleware('checkrole:admin');
    Route::delete('/news/{newsId}/delete', 'delete')->name('news.delete')->middleware('checkrole:admin');
});

Route::controller(CarController::class)->group(function () {
    Route::get('/car/create', 'create')->name('car.create')->middleware('checkrole:admin,user');
    Route::get('/cars', 'index')->name('car.index');
    Route::get('/cars/requests', 'carsRequests')->name('car.table')->middleware('checkrole:admin');

    Route::post('/car/store', 'store')->name('car.store')->middleware('checkrole:admin,user');
    Route::get('/car/{id}', 'show')->name('car.show');
    Route::get('/car/{id}/edit', 'edit')->name('car.edit')->middleware('checkrole:admin,user');
    Route::put('/car/{id}', 'update')->name('car.update')->middleware('checkrole:admin,user');

    Route::post('/car/accept-request/{id}', 'acceptRequest')->name('car.accept')->middleware('checkrole:admin');
    Route::get('/car/{id}/archive', 'softDelete')->name('car.soft-delete')->middleware('checkrole:admin');
    Route::delete('/car/{id}/delete', 'forceDelete')->name('car.force-delete')->middleware('checkrole:admin,user');
    Route::get('/car/restore/{id}', 'restore')->name('car.restore')->middleware('checkrole:admin');
    Route::get('/cars/archived', 'getAllArchivedCars')->name('car.archived')->middleware('checkrole:admin');
});

Route::prefix('tags')->controller(TagController::class)->middleware('checkrole:admin')->group(function () {
    Route::get('/create', 'create')->name('tag.create');
    Route::post('/store', 'store')->name('tag.store');
    Route::get('/', 'index')->name('tag.index');
    Route::get('/{tag}/edit', 'edit')->name('tag.edit');
    Route::put('/{tagId}', 'update')->name('tag.update');
    Route::delete('/{tagId}/delete', 'delete')->name('tag.delete');
});

Route::middl->resource('car_manufacturers', CarManufacturerController::class);

Route::controller(CarImagesController::class)->prefix('/car')->name('car.')->group(function () {
    Route::get('/{carId}/images', 'showCarImages')->name('show.images')->middleware('checkrole:admin,user');
    Route::post('/{carId}/store/images', 'storeImages')->name('store.images')->middleware('checkrole:admin,user');
    Route::delete('/image/{imageId}/delete', 'deleteImage')->name('delete.image')->middleware('checkrole:admin,user');
});
