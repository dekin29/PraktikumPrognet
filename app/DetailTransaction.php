<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    protected $table = 'transaction_details';
    protected $fillable = ['transaction_id','product_id','qty','discount','selling_price'];
}
