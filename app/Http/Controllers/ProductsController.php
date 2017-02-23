<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;

use App\Product;
use App\Seller;
use App\Tag;

class ProductsController extends Controller
{
    public function index(){
    	return Response::json(Product::with('tags')->get());
    }

    public function show(Product $product){
    	return $product->load('sellers');
    }

    public function store(Request $request){
    	$attributes = $request->all();
    	$product = Product::create($attributes);
    	return Response::json($product);
    }

    public function update(Request $request, Product $product){
    	$attributes = $request->all();
    	if($request->isMethod('put')){
    		$this->validate($request, [
    		'first_name' => 'required|string',
    		'last_name' => 'required|string'
    		]);
    	} else if($request->isMethod('patch')){
    		$this->validate($request, [
    		'first_name' => 'string',
    		'last_name' => 'string'
    		]);
    	}
    	$product->update($attributes);
    	return $product;
    }

    public function destroy(Product $product){
    	$product->delete();
    	return Response::json([], 200);
    }
}