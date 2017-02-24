<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    protected $fillable = ["reviewer_name", "title", "content", "review_date"];

    public function products(){
    	return $this->hasMany('App\Product');
    }
}
