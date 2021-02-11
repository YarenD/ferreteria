<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clasificacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->unique();
            $table->string('descripcion');
            $table->string('color');
            $table->timestamps();
        });

          // Insert some stuff
    DB::table('clasificacions')->insert(
        array(
            'nombre' => 'Sin Clasificación',
            'descripcion' => 'Productos sin clasificación',
            'color'=>'#FFFFFF'
        )
    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clasificacions');
    }
}
