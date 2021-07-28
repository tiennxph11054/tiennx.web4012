<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'table_products';
    protected $fillable = ['name', 'price', 'quantity', 'category_id', 'image', 'short_content', 'long_content', 'slug', 'sale_price', 'status'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
