<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailProductStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail__product__states', function (Blueprint $table) {
            $table->bigIncrements('id_product_state');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('state_id')->references('id_state')->on('states');
            $table->foreign('product_id')->references('id_product')->on('products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail__product__states');
    }
}
