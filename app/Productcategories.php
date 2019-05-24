<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productcategories extends Model
{
    protected $table = 'product_categories';
    protected $fillable = ['category_name'];
}
