<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'unit',
        'price',
        'stock_quantity',
    ];

    // Әр өнім бір категорияға тиесілі
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    // Өнім көптеген рецепттерде кездесуі мүмкін
    public function recipes()
    {
        return $this->hasMany(Recipe::class, 'product_id');
    }
}
