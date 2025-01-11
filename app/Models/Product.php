<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['title', 'price', 'desc', 'image', 'category_id', 'avaible', 'old_price', 'shop_id'];

    public function tags() {
        return $this->belongsToMany(Tag::class, 'products_tags', 'product_id', 'tag_id');
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

    public function colors() {
        return $this->belongsToMany(Color::class, 'product_colors', 'product_id', 'color_id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
