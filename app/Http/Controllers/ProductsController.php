<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;

use App\Http\Requests\ProductRequest;

use App\Product;
use App\Seller;
use App\Tag;
use App\Review;

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
            "description" => $attributes['description']
        ];
        $product = Product::create($productArray);
        $product->seller_id = $seller['id'];
        $product->save();
        //validating tags.
        $tags_request = $attributes['tags'];
        foreach($tags_request as $tag){
            $t = Tag::where("name", "=", $tag)->get();
            if(sizeof($t) == 0){
                $tagArray = [
                    "name" => $tag
                ];
                $new_tag = Tag::create($tagArray);
                $product->tags()->attach($new_tag->id);
            } else{
                foreach($t as $tt){
                    $product->tags()->attach($tt->id);
                }
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
        $reviews = Review::where("product_id", $product->id)->get();
        foreach($reviews as $review){
            $review->delete();
        }
    	$product->delete();
    	return Response::json([], 200);
    }
}