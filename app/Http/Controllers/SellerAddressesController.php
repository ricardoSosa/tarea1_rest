<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerAddressesController extends Controller
{
    public function store(Request $request){
    	$attributes = $request->all();
    	$this->validate($request, [
    		'address' => 'required',
    		'city' => 'required|string',
    		'state' => 'required|string',
    		'country' => 'required|string',
    		'postal_code' => 'required|string'
    		]);
    	$SellerAddress = SellerAddress::create($attributes);
    	return Response::json($SellerAddress);
    }

    public function update(Request $request, SellerAddress $sellerAddress){
    	$attributes = $request->all();
    	$this->validate($request, [
    		'address' => 'required|string',
    		'city' => 'required|string',
    		'state' => 'required|string',
    		'country' => 'required|string',
    		'postal_code' => 'required|string'
    		]);
    	$sellerAddress->update($attributes);
    	return $SellerAddress;
    }
}
