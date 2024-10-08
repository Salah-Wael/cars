<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class NewsTag extends Pivot
{
    protected $fillable = [
        'tag_id',

        'image_path',
    ];
}
