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
        $numOfProducts = 6;
        factory(App\Product::class, $numOfProducts)->create();
        $sellers = app\Seller::all();

        $product_id = 1;
        foreach($sellers as $seller){
            for($iteration=0; $iteration<3; $iteration++){
                $product = app\Product::find($product_id);
                $product->seller_id = $seller->id;
                $product->save();
                $product_id++;
            }
        }

        $products = app\Product::all();
        $tags = app\Tag::all()->list('id');

        foreach($products as $product){
            $
            $product->roles()->attach($faker->randomElement($tags));
        }
    }
}
