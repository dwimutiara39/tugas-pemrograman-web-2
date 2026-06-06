<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
    'title',
    'director',
    'description',
    'release_year',
];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}