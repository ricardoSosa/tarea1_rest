<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerAddressesController extends Controller
{
    public function store(Request $request){
    	$attributes = $request->all();
    	$SellerAddress = SellerAddress::create($attributes);
    	return Response::json($SellerAddress);
    }

    public function update(Request $request, SellerAddress $sellerAddress){
    	$attributes = $request->all();
    	$sellerAddress->update($attributes);
    	return $SellerAddress;
    }
}
