<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::table('sellers_addresses', function (Blueprint $table) {
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->integer('postal_code');
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sellers_addresses');
    }
}
