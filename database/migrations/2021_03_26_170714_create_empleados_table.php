<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('id_empleado');
            $table->string('nombre_empleado',40);
            $table->string('apellido_pempleado',40);
            $table->string('apellido_mempleado',40);
            $table->string('celular_empleado',10);       
            $table->string('email_empleado',40);

            $table->string('calle_empleado',40);
            $table->integer('codigo_postalempleado');
            $table->string('sexo_empleado',40);
                         

            $table->unsignedBigInteger('id_tipo_empleado');
            $table->foreign('id_tipo_empleado')->references('id_tipo_empleado')->on('tipoempleados');

            $table->unsignedBigInteger('id')->nullable();
            $table->foreign('id')->references('id')->on('users');

            $table->unsignedBigInteger('id_departamento');
            $table->foreign('id_departamento')->references('id_departamento')->on('departamentos');

            $table->unsignedBigInteger('id_municipio');
            $table->foreign('id_municipio')->references('id_municipio')->on('municipios');

            $table->unsignedBigInteger('id_estado');
            $table->foreign('id_estado')->references('id_estado')->on('estados');


            $table->string('contratopdf')->nullable();

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
        Schema::dropIfExists('empleados');
    }
}
