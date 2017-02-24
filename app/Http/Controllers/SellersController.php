<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;

use App\Seller;

use App\Product;

use App\SellerAddress;

use App\Http\Requests\SellerRequest;

class SellersController extends Controller
{
     public function index(){
    	return Response::json(Seller::all());
    }

    public function show(Seller $seller){
    	return $seller;
    }

    public function store(SellerRequest $request){
    	$attributes = $request->all();
        $seller = Seller::create($attributes);
    	return Response::json($seller);
    }

    public function update(SellerRequest $request, Seller $seller){
    	$attributes = $request->all();
    	$seller->update($attributes);
    	return $seller;
    }

    public function destroy(Seller $seller){
        //Product delete.
        $idSeller = $seller->id;
        $product = Product::findOrFail($idSeller);
        $product->delete();
        //Address delete.
        $idAddress = $seller->seller_address_id;
        $seller_address = SellerAddress::findOrFail($idAddress);
        $seller_address->delete();
        //Seller delete.
        $seller->delete();
    	return Response::json([], 200);
    }
}

