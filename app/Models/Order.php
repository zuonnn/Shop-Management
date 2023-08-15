<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'quantity',
        'total',
    ];
    public function order_detail() {
        return $this->hasMany(OrderDetail::class);
    }
}
