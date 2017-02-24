<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SellerAddressRequest;

use Illuminate\Support\Facades\Response;

use App\Seller;

use App\SellerAddress;

class SellerAddressesController extends Controller
{
    public function index(){
        return Response::json(SellerAddress::all());
    }

    public function store(SellerAddressRequest $request, Seller $seller){
    	$attributes = $request->all();
    	$sellerAddress = SellerAddress::create($attributes);
    	$this->attach($sellerAddress, $seller);
    	return $sellerAddress;
    }

    private static function attach(SellerAddress $sellerAddress, Seller $seller){
	    $seller->seller_address_id = $sellerAddress['id'];
	    $seller->save();
	    return $seller;
    }

    public function update(SellerAddressRequest $request, Seller $seller){
    	$attributes = $request->all();
        $addressId = $seller->seller_address_id;
        $sellerAddress = SellerAddress::findOrFail($addressId);
    	$sellerAddress->update($attributes);
    	return $sellerAddress;
    }
}
