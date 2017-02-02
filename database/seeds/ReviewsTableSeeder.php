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
        $numOfProducts = 60;
        factory(App\Review::class, $numOfProducts)->create();

        $review_id = 1;
        foreach($products as $product){
            for($iteration=0; $iteration<10; $iteration++){
                $review = app\Product::find($review_id);
                $review->product_id = $product->id;
                $review->save();
                $review_id++;
            }
        }
    }
}
