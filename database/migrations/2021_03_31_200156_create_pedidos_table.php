<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id('id_pedido');

            $table->string('fecha_pedido');
            $table->string('fechaentrega_pedido');
            $table->string('hora_pedido');
            $table->string('estatus');
            $table->string('total');



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
        Schema::dropIfExists('pedidos');
    }
}
