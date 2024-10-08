<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class NewsTag extends Pivot
{
    protected $fillable = [
        'product_id',
        'image_path',
    ];
}
