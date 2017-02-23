<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Product;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{

	public function index(){
		return Response::json(Review::);
	}

    public function store(ReviewRequest $request, Product $product){
    	$attributes = $request->all();
    	$review = Review::create($attributes);
        attach($review, $product);
    	return Response::json($review);
    }

    public function attach(Review $review, Product $product){
        $product->review_id = $review['id'];
        $product->save();
        return $review;
    }

    public function destroy(Review $review){
    	$review->delete();
    	return Response::json([], 200);
    }
}
