<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id('id_proveedor');
            $table->string('nombre_proveedor',100);
            $table->string('rfc_proveedor',40);
            $table->string('celular_proveedor',10);
            $table->string('email_proveedor',40);
            $table->string('tipopersona_proveedor',40);


            $table->unsignedBigInteger('id_razonsocial');
            $table->foreign('id_razonsocial')->references('id_razonsocial')->on('razonsocials');


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
        Schema::dropIfExists('proveedores');
    }
}
