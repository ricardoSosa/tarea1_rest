<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numOfItems = 6;
        $products = factory(App\Product::class, $numOfItems)->make();
        $sellers = App\Seller::all();
        $product_index = 0;
        foreach($sellers as $seller){
            for($iterations=0; $iterations<3; $iterations++){
                $products[$product_index]['seller_id'] = $seller->id;
                $products[$product_index]->save();
                $product_index++;
            }
        }

        $products = App\Product::all();
        foreach ($products as $product) {
            $product->tags()->attach(App\Tag::find(rand(1,5)));
            $product->tags()->attach(App\Tag::find(rand(1,5)));
        }
    }
}
