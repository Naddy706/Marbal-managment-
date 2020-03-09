<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('Stock_Id');
            $table->date('Stock_date');
            $table->bigInteger('Product_Id')->unsigned();
            $table->bigInteger('Supplier_Id')->unsigned();
            $table->bigInteger('Box_Quantity');
            $table->bigInteger('Box_Pieces');
            $table->bigInteger('Toatl_Pieces');
            $table->bigInteger('Marbal_Length');
            $table->bigInteger('Total_Length');
            $table->timestamps();
            $table->foreign('Product_Id')->references('id')->on('products');
            $table->foreign('Supplier_Id')->references('id')->on('suppliers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
