<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';

    protected $fillable = ['title', 'color_id'];


    public function relProd() {
        return $this->hasMany(ProductColor::class ,'color_id', 'id');
    }

    public function products() {
        return $this->belongsTo(Product::class, 'id', 'id');
    }

}
