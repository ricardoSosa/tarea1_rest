<?php

use Illuminate\Database\Seeder;

class SellerAddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numOfItems = 2;
        factory(App\SellerAddress::class, $numOfItems)->create();
    }
}
