<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use Filterable;

    protected $table = 'products';

    protected $fillable = ['title', 'price', 'desc', 'image', 'category_id', 'avaible', 'old_price', 'shop_id'];

    public function tags() {
        return $this->belongsToMany(Tag::class, 'products_tags', 'product_id', 'tag_id');
    }
    public function colors() {
        return $this->belongsToMany(Color::class, 'product_colors', 'product_id', 'color_id');
    }
    public function relTags() {
        return $this->hasMany(ProductTag::class, 'product_id', 'id');
    }
    public function relColors() {
        return $this->hasMany(ProductColor::class, 'product_id', 'id');
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
