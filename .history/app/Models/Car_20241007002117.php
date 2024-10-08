<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        	color	plate	image	description	price	status	user_id
        'name',
        'model',
        'description',
        'price',
        'image',


    ];
}
