<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function sellers(){
    	return $this->hasMany('app\Seller');
    }

    public function reviews(){
    	return $this->belongsToMany('app\Review');
    }

    public function tags(){
    	return $this->belongsToMany('app\Tag');
    }
}
