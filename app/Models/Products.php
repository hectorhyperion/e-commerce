<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
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

    public function category()
    {
        return $this->belongsTo(Category::class ,'category');
    }
    public function scopeFilter($query, array $filters)
    {

     if($filters['search'] ?? false)
     {
            $query->where('product_name', 'like','%'.request('search'). '%' )
            ->orWhere('category', 'like','%'.request('search'). '%' )
            ->orWhere('description', 'like','%'.request('search'). '%' )
            ->orWhere('price', 'like','%'.request('search'). '%' ) ;

     }
    }
}
