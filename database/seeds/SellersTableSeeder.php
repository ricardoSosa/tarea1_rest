<?php

use Illuminate\Database\Seeder;

class SellersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numOfProducts = 2;
        factory(App\Seller::class, $numOfProducts)->create();
        $sellers = app\Seller::all();
        $sellerAddresses = app\SellerAddress::all();

        for($index=1; $index<=$numOfProducts; $index++){
        	$seller = app\Seller::find($index);
        	$sellerAddress = app\SellerAddress::find($index);
        	$seller->seller_address_id = $sellerAddress->id;
            $seller->save();
        }
    }
}
