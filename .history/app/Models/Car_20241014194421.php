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
        if (request()->routeIs('car.create')|| request()->routeIs('car.create')) {
            return $this->belongsToMany(CarImage::class, 'car_images', 'car_id', 'image');
        } else {
            return $this->hasMany(CarImage::class, 'car_id');
        }
        // return $this->belongsToMany(CarImage::class, 'car_images', 'car_id', 'image');
        // return $this->belongsToMany(CarImage::class, 'car_images', 'car_id', 'image');
        return $this->hasMany(CarImage::class, 'car_id');
    }
}