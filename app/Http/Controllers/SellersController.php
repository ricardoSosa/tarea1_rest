<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;

use App\Seller;

class SellersController extends Controller
{
     public function index(){
    	return Response::json(Seller::all());
    }

    public function show(Seller $seller){
    	return $seller;
    }

    public function store(Request $request){
    	$attributes = $request->all();
    	$this->validate($request, [
    		'first_name' => 'required',
    		'last_name' => 'required'
    		]);
    	$seller = Seller::create($attributes);
    	return Response::json($seller);
    }

      public function attach(Request $request, Seller $seller){
	    $address = $request->all();
	    $seller->seller_address_id = $address['id'];
	    $seller->save();
	    return $seller;
	  }

    public function update(Request $request, Seller $seller){
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
    	$seller->update($attributes);
    	return $seller;
    }

    public function destroy(Seller $seller){
    	$seller->delete();
    	return Response::json([], 200);
    }
}

