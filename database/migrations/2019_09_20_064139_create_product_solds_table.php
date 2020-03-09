<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSoldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_solds', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('Customer_Id')->unsigned();
            $table->bigInteger('Product_Id')->unsigned();
            $table->string('Invoice_No');
            $table->date('Invoice_Date');
            $table->float('marbal_length');
            $table->float('price');
            $table->bigInteger('SubTotal');
            $table->bigInteger('VAT_Per');
            $table->bigInteger('VAT_Amount');
            $table->bigInteger('Discount_Per');
            $table->bigInteger('Discount_Amount');
            $table->bigInteger('Grand_Total');
            $table->bigInteger('Total_Payment');
            $table->bigInteger('PaymentDue');
            $table->bigInteger('PaymentType');
            $table->timestamps();
            $table->foreign('Product_Id')->references('id')->on('products');
            $table->foreign('Customer_Id')->references('id')->on('customers');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_solds');
    }
}
