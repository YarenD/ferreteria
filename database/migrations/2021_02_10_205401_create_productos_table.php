<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
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
            $table->string('sku');
            $table->text('nombre');
            $table->string('unidad_medida');
            $table->text('descripcion');
            $table->decimal('precio', 20, 2);
            $table->string('imagen');
            $table->bigInteger('clasificacion_id')->unsigned();
            $table->foreign('clasificacion_id')->references('id')->on('clasificacions');
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
