<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'image',
    ];

    p

    public function carImage(){
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }
}
