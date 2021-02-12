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
            $table->bigInteger('id_clasificacion')->unsigned()->index(); 
            $table->foreign('id_clasificacion')->references('id')->on('clasificaciones');
            $table->string('sku',20);
            $table->string('nombre',50);
            $table->bigInteger('id_unidad_medida')->unsigned()->index(); 
            $table->foreign('id_unidad_medida')->references('id')->on('unidad_medida');
            $table->char('descripcion',100);
            $table->decimal('precio',8,2);
            $table->string('foto',20);
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
