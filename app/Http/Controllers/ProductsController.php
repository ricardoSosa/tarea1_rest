<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;

use App\Product;

class ProductsController extends Controller
{
    public function index(){
    	return Response::json(Product::all());
    }

    public function show(Product $product){
    	return $product;
    }

    public function store(Request $request){
    	$attributes = $request->all();
    	$product = Product::create($attributes);
    	return Response::json($product);
    }

    public function update(Request $request, Product $product){
    	$attributes = $request->all();
    	if($request->isMethod('put')){


    	} else if($request->isMethod('patch')){

    	}
    	$product->update($attributes);
    	return $product;
    }

    public function destroy(Product $product){
    	$product->delete();
    	return Response::json([], 200);
    }
}