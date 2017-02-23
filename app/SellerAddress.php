<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerAddress extends Model
{
    protected $table = 'seller_addresses';

    protected $fillable = ["address", "city", "state", "country", "postal_code"];

    public function sellers(){
    	return $this->belongsTo('App\Seller');
    }
}
