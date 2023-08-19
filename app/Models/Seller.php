<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    protected $table = 'sellers';
    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'birthday',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function totalIncome()
    {
        return $this->orders->sum('total_amount');
    }

}