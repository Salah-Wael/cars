<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class NewsTag extends Pivot
{
    protected $fillable = [
        'product_id',	news_id

        'image_path',
    ];
}
