<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('id_venta');
            $table->string('nombre_razonsocial',60);
            $table->string('tipocomprobante',60);
            $table->string('seriecomprobante');
            $table->datetime('fecha_hora');
            $table->string('iva');
            $table->decimal('total_venta');
 

            $table->unsignedBigInteger('id_infcliente');
            $table->foreign('id_infcliente')->references('id_infcliente')->on('informacionclientes');

            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('users');

            $table->timestamp('deleted_at')->nullable(); 
            $table->rememberToken();
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
        Schema::dropIfExists('ventas');
    }
}
 