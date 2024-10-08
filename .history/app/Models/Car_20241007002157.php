<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'model',
        'color',
        'plate',
        'status',
        'user_id',
        'description',
        'price',
        'image',


    ];
}
