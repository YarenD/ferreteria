<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id_product');
            $table->string('sku',12);
            $table->string('name_product',60);
            $table->text('description');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('classification_id');
            $table->foreign('state_id')->references('id_state')->on('states');
            $table->foreign('classification_id')->references('id_classification')->on('classifications');
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
        Schema::dropIfExists('products');
    }
}
