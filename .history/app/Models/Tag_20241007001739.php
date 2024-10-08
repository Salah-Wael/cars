<?php

namespace App\Models;

use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public $timestamps = false;

    public function news()
    {
        return $this->belongsToMany(News::class, 'news_tag');
    }
}
