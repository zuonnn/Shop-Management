<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'price',
        'stock_quantity'
    ];
    public function brand() {
        return $this->belongsTo(Brand::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function order_detail() {
        return $this->belongsTo(OrderDetail::class);
    }
    public function user()
{
    return $this->belongsTo(User::class);
}
}
