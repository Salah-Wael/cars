<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarManufacturer extends Model
{
    use HasFactory;

    const CREATED_AT = null;
    const updated_at = null;

    protected $fillable = [
        'manufacturer',
    ];
}
