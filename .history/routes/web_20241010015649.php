<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarImagesController;

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
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::view('/error-404','error.404')->name('error.404');
Route::view('/error-401','error.401')->name('error.401');

Route::view('/contact-us', 'contact')->name('contact');

Route::prefix('news')->controller(NewsController::class)->group(function () {
    Route::get('/create', 'create')->name('news.create')->middleware('checkrole:admin');
    Route::post('/store', 'store')->name('news.store')->middleware('checkrole:admin');
    Route::get('/{newsId}', 'show')->name('news.show');
    Route::get('/{search?}', 'index')->name('news.index');
    Route::get('/{newsId}/edit', 'edit')->name('news.edit')->middleware('checkrole:admin');
    Route::put('/{newsId}', 'update')->name('news.update')->middleware('checkrole:admin');
    Route::delete('/news/{newsId}/delete', 'delete')->name('news.delete')->middleware('checkrole:admin');
});

Route::controller(CarController::class)->group(function () {
    Route::get('/car/create', 'create')->name('car.create')->middleware('checkrole:admin,user');
    Route::get('/cars', 'index')->name('car.index');
    Route::get('/all-cars', 'carsTable')->name('car.table')->middleware('checkrole:admin');

    Route::post('/car/store/{user_id}', 'store')->name('car.store')->middleware('checkrole:admin,user');
    Route::get('/car/{id}', 'show')->name('car.show');
    Route::get('/car/{id}/edit', 'edit')->name('car.edit')->middleware('checkrole:admin,user');
    Route::put('/car/{id}', 'update')->name('car.update')->middleware('checkrole:admin,user');
    Route::delete('/car/{id}/delete', 'delete')->name('car.delete')->middleware('checkrole:admin,user');
});

Route::prefix('tags')->controller(TagController::class)->middleware('checkrole:admin')->group(function () {
    Route::get('/create', 'create')->name('tag.create');
    Route::post('/store', 'store')->name('tag.store');
    Route::get('/', 'index')->name('tag.index');
    Route::get('/{tag}/edit', 'edit')->name('tag.edit');
    Route::put('/{tagId}', 'update')->name('tag.update');
    Route::delete('/{tagId}/delete', 'delete')->name('tag.delete');
});

Route::controller(CarImagesController::class)->prefix('/car')->name('car.')->group(function () {
    Route::get('/{carId}/images', 'showCarImages')->name('show.images')->middleware('checkrole:admin,user');
    Route::post('/{carId}/store/images', 'storeImages')->name('store.images')->middleware('checkrole:admin,user');
    Route::delete('/image/{imageId}/delete', 'deleteImage')->name('delete.image')->middleware('checkrole:admin,user');
});
