<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable  = [
        'name', 'description','quantity', 'created_at','updated_at','deleted_at'
    ];
    /**
     * @var mixed
     *//**
     * @var mixed
     */
}
