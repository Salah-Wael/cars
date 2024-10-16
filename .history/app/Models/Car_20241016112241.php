<?php

namespace App\Models;

use App\Models\CarImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id'
    ];

    public function images()
    {
        // return $this->belongsToMany(CarImage::class, 'car_images', 'car_id', 'image_id');
        // return $this->belongsToMany(CarImage::class, 'car_images', 'car_id', 'image');
        if (request()->routeIs('car.store')|| request()->routeIs('car.update')) {
        } else {
            return $this->hasMany(CarImage::class, 'car_id');
            return $this->belongsToMany(CarImage::class, 'car_images', 'car_id', 'image');
        }
    }
}
