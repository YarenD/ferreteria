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
            $table->integer('id_clasificacion')->unsigned();
            $table->string('sku');
            $table->string('nombre');
            $table->string('unidad_medida');
            $table->text('descripcion');
            $table->decimal('precio');
            $table->string('foto', 25);
            $table->timestamps();
	        $table->foreign('id_clasificacion')->references('id')->on('clasificaciones');
           
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
