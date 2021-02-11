<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sku', 100);
            $table->string('nombre', 150);
            $table->string('unidad_medida', 150);
            $table->string('descripcion', 250);
            $table->decimal('precio', 10, 2);
            $table->string('foto', 120)->default('product_image.jpg');
            $table->unsignedBigInteger('clasificacion_id')->unsigned()->nullable();
            $table->foreign('clasificacion_id')->references('id')->on('clasificaciones')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('productos');
    }
}
