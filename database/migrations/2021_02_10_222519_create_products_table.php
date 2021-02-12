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
            $table->bigIncrements('id');

            $table->string('sku');
            $table->string('nombre');
            $table->string('unidad_medida');
            $table->text('descripcion');
            $table->decimal('precio',8,2);
            $table->string('foto');

            $table->unsignedBigInteger('clasification_id');
            $table->foreign('clasification_id')->references('id')->on('clasifications')->onDelete('cascade');;

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
