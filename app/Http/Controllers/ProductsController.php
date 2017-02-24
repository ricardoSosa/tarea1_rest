<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;

use App\Http\Requests\ProductRequest;

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

    public function store(ProductRequest $request){
    	$attributes = $request->all();

        //Validating the existence of the seller.
        $seller = Seller::findOrFail($attributes['seller_id']);

        $productArray = [
            "name" => $attributes['name'],
            "price" => $attributes['price'],
            "description" =>$attributes['description']
        ];
        $product = Product::create($productArray);
        $product->seller_id = $seller->id;
        $tags_request = $attributes['tags'];
        foreach($tags_request as $tag){
            $t = Tag::where("name", "=", $tag);
            if($t == null){
                $tagArray = [
                    "name" => $tag
                ];
                $new_tag = Tag::create($tagArray);
                $product->tag_id = $new_tag->id;
            } else{
                $product->tag_id = $t->id;
            }
        }
    	return Response::json($product);
    }

    public function update(ProductRequest $request, Product $product){
    	$attributes = $request->all();
    	$product->update($attributes);
    	return $product;
    }

    public function destroy(Product $product){
        $reviewId = $product;

    	$product->delete();
    	return Response::json([], 200);
    }
}