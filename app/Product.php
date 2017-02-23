<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ["name", "price", "description"];

    public function seller(){
    	return $this->belongsTo('App\Seller');
    }

    public function reviews(){
    	return $this->belongsToMany('App\Review');
    }

    public function tags(){
    	return $this->belongsToMany('App\Tag');
    }
}
