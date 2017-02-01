<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $table = "sellers";

    public function sellersAdresses(){
    	return $this->hasOne('app\SellerAddress');
    }

    public function products(){
    	return $this->belongsTo('app\Product');
    }
}
