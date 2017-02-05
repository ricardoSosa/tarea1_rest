<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numOfItems = 60;
        factory(App\Review::class, $numOfItems)->make();
        $products = App\Product::all();

        $review_id = 1;
        foreach($products as $product){
            for($iteration=0; $iteration<10; $iteration++){
                $review = App\Product::find($review_id);
                $review->product_id = $product->id;
                $review->save();
                $review_id++;
            }
        }
    }
}
