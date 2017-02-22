<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewsController extends Controller
{

	public function index(){
		return Response::json(Review::all);
	}

    public function store(Request $request){
    	$attributes = $request->all();
    	$review = Review::create($attributes);
    	return Response::json($review);
    }

    public function destroy(Review $review){
    	$review->delete();
    	return Response::json([], 200);
    }
}
