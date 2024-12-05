<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
 
    protected $table = 'products'; 


    protected $fillable = [
        'name', 'code', 'description', 'category', 
        'supplier_id', 'cost_price', 'sell_price', 
        'stock_min', 'expiration_date'
    ];
   
    protected $casts = [
        'expiration_date' => 'datetime',
    ];

  
}
