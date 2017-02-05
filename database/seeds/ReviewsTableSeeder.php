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
        $reviews = factory(App\Review::class, $numOfItems)->make();
        $products = App\Product::all();
        $review_index = 0;
        foreach($products as $product){
            for($iteration=0; $iteration<10; $iteration++){
                $reviews[$review_index]['product_id'] = $product->id;
                $reviews[$review_index]->save();
                $review_index++;
            }
        }
    }
}
