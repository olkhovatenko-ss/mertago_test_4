<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{

    protected $primaryKey="unit_id";

    public function products() {
        return $this->hasMany(Product::class, 'product_unit_id');
    }

}
