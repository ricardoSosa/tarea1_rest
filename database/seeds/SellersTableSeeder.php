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
        $numOfItems = 2;
        $sellers = factory(App\Seller::class, $numOfItems)->make();
        $sellerAddresses = App\SellerAddress::all();

        $add_index = 1;
        foreach($sellers as $seller){
            $sellerAddress = App\SellerAddress::find($add_index);
            $seller->seller_address_id = $sellerAddress->id;
            $seller->save();
            $add_index++;
        }
    }
}
