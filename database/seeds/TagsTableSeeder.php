<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numOfProducts = 5;
        factory(App\Tag::class, $numOfProducts)->create();
    }
}
