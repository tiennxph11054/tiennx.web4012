<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices';
    protected $fillable = ['user_id	phone', 'address', 'total_price',    'status'];
    public function invoiceDetails()
    {
        //có nhiều hóa đơn chi tiết
        return $this->hasMany(InvoiceDetail::class, 'invoice_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    //Acesstor
    // public function getTotalPriceAttribute()
    // {
    //     $newValue = $this->attributes['total_price'] . "VND";
    //     return $newValue;
    // }
}
