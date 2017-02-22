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
    	$seller = Seller::create($attributes);
    	return Response::json($seller);
    }

    public function update(Request $request, Seller $seller){
    	$attributes = $request->all();
    	$seller->update($attributes);
    	return $seller;
    }

    public function destroy(Seller $seller){
    	$seller->delete();
    	return Response::json([], 200);
    }
}

