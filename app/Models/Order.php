<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'order_date',
        'total_price',
        'pdf'
    ];

    public function seller() {
        return $this->belongsTo(Seller::class);
    }
}
