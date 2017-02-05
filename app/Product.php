<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function sellers(){
    	return $this->hasMany('App\Seller');
    }

    public function reviews(){
    	return $this->belongsToMany('App\Review');
    }

    public function tags(){
    	return $this->belongsToMany('App\Tag');
    }
}
