<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Products extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
}
