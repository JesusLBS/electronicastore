<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformacionclientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacionclientes', function (Blueprint $table) {
            $table->id('id_infcliente');
            $table->string('nombre_cliente',40);
            $table->string('apellido_pcliente',40);
            $table->string('apellido_mcliente',40);
            $table->string('direccion_cliente',60);
            $table->string('departamento_cliente',100)->nullable();
            $table->string('colonia_cliente',40);
            $table->string('ciudad_cliente');
            $table->integer('codigo_postalcliente');
            $table->string('sexo_cliente',1);
            $table->string('email_cliente',40);
            $table->string('celular_cliente',10);
            $table->string('referencia_cliente')->nullable();



            $table->unsignedBigInteger('id_estado');
            $table->foreign('id_estado')->references('id_estado')->on('estados');

            $table->unsignedBigInteger('id_municipio');
            $table->foreign('id_municipio')->references('id_municipio')->on('municipios');

            $table->unsignedBigInteger('id_via');
            $table->foreign('id_via')->references('id_via')->on('vias');

            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('users')->nullable(); 

            
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
        Schema::dropIfExists('informacionclientes');
    }
}
