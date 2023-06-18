<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'quantity',
        'confirm_quantity',
        'minimum_quantity',
        'cost_price',
        'sale_price',
        'photo',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
