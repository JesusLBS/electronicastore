<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallepedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallepedidos', function (Blueprint $table) {
            $table->id('id_detallepedido');

            $table->string('precio_producto');
            $table->string('cantidad');
            $table->string('subtotal');

 
            $table->unsignedBigInteger('id_pedido');
            $table->foreign('id_pedido')->references('id_pedido')->on('pedidos');

            $table->unsignedBigInteger('id_producto');
            $table->foreign('id_producto')->references('id_producto')->on('productos');


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
        Schema::dropIfExists('detallepedidos');
    }
}
