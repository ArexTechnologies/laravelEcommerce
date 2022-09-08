<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image', 'price', 'description','review'];

    public function review()
    {
        return $this->hasMany(Review::class, 'product_id');
    }
}