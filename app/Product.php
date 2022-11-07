<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $primaryKey="product_id";

    protected $fillable = ['product_name', 'product_price', 'product_quantity', 'product_unit_id'];

    public function unit() {

        return $this->belongsTo('App\Unit', 'product_unit_id');

    }

}
