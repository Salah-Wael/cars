<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        		plate	image	description	price	status	user_id
        'name',
        'model',
        'color',
        'description',
        'price',
        'image',


    ];
}
