<?php

use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
    Route::get('/create', 'create')->name('news.create')->middleware('auth');
    Route::post('/store', 'store')->name('news.store')->middleware('auth');
    Route::get('/{newsId}', 'show')->name('news.show');
    Route::get('/', 'index')->name('news.index');
    Route::get('/{newsId}/edit', 'edit')->name('news.edit')->middleware('auth');
    Route::put('/{newsId}', 'update')->name('news.update')->middleware('auth');
    Route::delete('/news/{newsId}/delete', 'delete')->name('news.delete')->middleware('auth');
});

Route::prefix('tags')->controller(TagController::class)->group(function () {
    Route::get('/create', 'create')->name('tag.create')->middleware('auth');
    Route::post('/store', 'store')->name('tag.store')->middleware('auth');
    Route::get('/', 'index')->name('tag.index');
    Route::get('/{tag}/edit', 'edit')->name('tag.edit')->middleware('auth');
    Route::put('/{tagId}', 'update')->name('tag.update')->middleware('auth');
    Route::delete('/{tagId}/delete', 'delete')->name('tag.delete')->middleware('auth');
});

Route::controller(CarImagesController::class)->prefix('/car')->name('car.')->group(function () {
    Route::get('/{carId}/images', 'showCarImages')->name('show.images')->middleware('auth');
    Route::post('/{carId}/store/images', 'storeImages')->name('store.images')->middleware('auth');
    Route::delete('/image/{imageId}/delete', 'deleteImage')->name('delete.image')->middleware('checkrole:admin');
});
