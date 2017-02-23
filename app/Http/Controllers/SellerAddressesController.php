<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerAddressesController extends Controller
{
    public function store(SellerAddressRequest $request, Seller $seller){
    	$attributes = $request->all();
    	$sellerAddress = SellerAddress::create($attributes);
    	attach($sellerAddress, $seller);
    	return Response::json($sellerAddress);
    }

    public function attach(SellerAddress $sellerAddress, Seller $seller){
	    $seller->seller_address_id = $sellerAddress['id'];
	    $seller->save();
	    return $seller;
    }

    public function update(SellerAddressRequest $request, SellerAddress $sellerAddress){
    	$attributes = $request->all();
    	$sellerAddress->update($attributes);
    	return $sellerAddress;
    }
}
