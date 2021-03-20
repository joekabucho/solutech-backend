<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier_products extends Model
{
    protected $fillable = [
       'supply_id','product_id'
    ];}
