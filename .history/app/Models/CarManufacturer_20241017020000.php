<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarManufacturer extends Model
{
    use HasFactory;

    const updated_at = null;
    const created_at = null;
    protected $fillable = [
        'manufacturer',
    ];
}
