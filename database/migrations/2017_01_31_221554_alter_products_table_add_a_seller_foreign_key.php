<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProductsTableAddASellerForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
        	$table->integer('seller_id')->unsigned();
        	$table->foreign('seller_id')
        	->references('id')
        	->on('sellers')
        	->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
        	$table->dropForeign('products_seller_id_foreign');
        	$table->dropColumn('seller_id');
        });
    }
}
