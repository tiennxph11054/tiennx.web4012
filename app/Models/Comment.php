<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $fillable = ['name', 'email', 'content', 'product_id'];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
