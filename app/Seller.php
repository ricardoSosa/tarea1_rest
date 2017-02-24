<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $table = "sellers";

    protected $fillable = ["first_name", "last_name"];

    public function sellerAdress(){
    	return $this->hasOne('App\SellerAddress');
    }

    public function products(){
    	return $this->hasMany('App\Product');
    }
}
