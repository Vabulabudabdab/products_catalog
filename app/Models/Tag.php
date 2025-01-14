<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $fillable = ['title'];


    public function relProd() {

        return $this->hasMany(ProductTag::class ,'tag_id', 'id');

    }

}
