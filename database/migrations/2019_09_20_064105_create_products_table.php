<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('Product_Id');
            $table->string('Product_Name');
            $table->bigInteger('Category_Id')->unsigned();
            $table->bigInteger('Sub_Category_Id')->unsigned();
            $table->string('Features');
            $table->bigInteger('Price');
            $table->bigInteger('Sell_Price');
            $table->timestamps();
            $table->foreign('Category_Id')->references('id')->on('categories');
            $table->foreign('Sub_Category_Id')->references('id')->on('sub_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
