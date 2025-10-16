<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'price',
    ];

    // Тағам бір категорияға тиесілі
    public function category()
    {
        return $this->belongsTo(DishCategory::class, 'category_id');
    }

    // Бір тағамда бірнеше рецепт болуы мүмкін
    public function recipes()
    {
        return $this->hasMany(Recipe::class, 'dish_id');
    }

    // Тағам көптеген тапсырыстарда кездесуі мүмкін
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'dish_id');
    }
}
