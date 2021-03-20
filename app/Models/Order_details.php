<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
    protected $fillable = [
        'supply_id','product_id', 'created_at','updated_at'
    ];
}
