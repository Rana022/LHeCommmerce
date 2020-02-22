<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $fillable = [
        'product_name', 'category_id', 'manufacture_id', 
        'product_short_description', 'product_long_description', 'product_prize',
        'product_size', 'product_color', 'publication_status', 

    ];
    protected $table = 'tbl_products';

}
