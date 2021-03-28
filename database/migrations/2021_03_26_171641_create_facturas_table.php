<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id('id_factura');
            $table->string('rfc_cliente',40);
            $table->string('email_cliente',40);
            $table->string('nombre_cliente',40);
            $table->string('celular_cliente',10);
            $table->string('calle_cliente',40);
            $table->integer('codigo_postalcliente');  

 
            $table->unsignedBigInteger('id_municipio');
            $table->foreign('id_municipio')->references('id_municipio')->on('municipios');

            $table->unsignedBigInteger('id_estado');
            $table->foreign('id_estado')->references('id_estado')->on('estados');

            $table->unsignedBigInteger('id_razonsocial');
            $table->foreign('id_razonsocial')->references('id_razonsocial')->on('razonsocials');

            $table->unsignedBigInteger('id_tipofactura');
            $table->foreign('id_tipofactura')->references('id_tipofactura')->on('tipofacturas');


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
        Schema::dropIfExists('facturas');
    }
}
