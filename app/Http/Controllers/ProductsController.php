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
    	$products = Product::all()->load('tags', 'seller');
    	return Response::json($products);
    }

    public function show(Product $product){
    	return $product->load('tags', 'seller');
    }

    public function store(Request $request){
    	$attributes = $request->all();
    	$product = Product::create($attributes);
    	return Response::json($product);
    }

    public function update(ProductRequest $request, Product $product){
    	$attributes = $request->all();
    	$product->update($attributes);
    	return $product;
    }

    public function destroy(Product $product){
    	$product->delete();
    	return Response::json([], 200);
    }
}