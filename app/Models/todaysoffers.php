<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todaysoffers extends Model
{
    use HasFactory;
    protected $fillable = [
        'category',
        'quantity',
        'image',
        'description',
        'price',
        'discount_price',
        'product_name'

    ];
}
