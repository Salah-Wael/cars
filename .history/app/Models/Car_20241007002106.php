<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        name	model	color	plate	image	description	price	status	user_id
        'name',
        'description',
        'price',
        'image',


    ];
}
