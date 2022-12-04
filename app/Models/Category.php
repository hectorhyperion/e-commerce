<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',

    ];
    public function products()
    {
        return $this->hasMany(Products::class, 'category');
    }
    public function scopeFilter($query, array $filters)
    {

     if($filters['search'] ?? false)
     {
            $query->where('category_name', 'like','%'.request('search'). '%' );

     }
    }
}

