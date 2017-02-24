<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Product;
use App\Review;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ReviewsController extends Controller
{

	public function show(Product $product){
		$review = Review::where("product_id", $product->id)->get();
        return Response::json($review);
	}

    public function store(ReviewRequest $request, Product $product){
    	$attributes = $request->all();
    	$review = Review::create($attributes);
        $this->attach($review, $product);
    	return Response::json($review);
    }

    public function attach(Review $review, Product $product){
        $review->product_id = $product['id'];
        $review->save();
        return $review;
    }

    public function destroy(Product $product, Review $review){
    	$review->delete();
    	return Response::json([], 200);
    }
}
