<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class order extends Model
{

    use HasFactory;

    use Notifiable;
    public function scopeFilter($query, array $filters)
    {

     if($filters['search'] ?? false)
     {
            $query->where('user_name', 'like','%'.request('search'). '%' )
            ->orWhere('email', 'like','%'.request('search'). '%' )
            ->orWhere('phone', 'like','%'.request('search'). '%' )
            ->orWhere('address', 'like','%'.request('search'). '%' ) ->orWhere('product_name', 'like','%'.request('search'). '%' ) ->orWhere('price', 'like','%'.request('search'). '%' ) ->orWhere('payment_status', 'like','%'.request('search'). '%' ) ->orWhere('delivery_status', 'like','%'.request('search'). '%' );

     }
    }
}
