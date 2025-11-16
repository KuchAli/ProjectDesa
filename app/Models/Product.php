<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'seller_id', 'category_id', 'name', 'description', 'price', 'stock', 'image',
    ];

    // Penjual produk
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id', 'id');
    }

    // Kategori produk
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Produk bisa ada di banyak order (melalui order_items)
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

