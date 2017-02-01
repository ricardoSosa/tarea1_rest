<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerAddress extends Model
{
    protected $table = 'seller_addresses';

    public function sellers(){
    	return $this->belongsTo('app\Seller');
    }
}
