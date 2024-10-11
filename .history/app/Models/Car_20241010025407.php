<?php

namespace App\Models;

use App\Models\CarImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [
        'name',
        'car_model',
        'color',
        'plate',
        'status',
        'user_id',
        'description',
        'price',
        'image',
    ];

    public function images()
    {
        return $this->hasMany(CarImage::class);
    }
}
