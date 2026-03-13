<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    // 1. Definimos los campos que se pueden llenar masivamente
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'image_path',
    ];

    // 2. Relación con la categoría (Opcional pero muy recomendada)
    // Esto permite hacer algo como: $product->category->name
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}