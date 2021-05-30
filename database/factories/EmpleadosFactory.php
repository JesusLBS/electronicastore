<?php

namespace Database\Factories;

use App\Models\empleados;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpleadosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = empleados::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_empleado' =>  $this->faker->firstName($gender = 'male'|'female'),
            'apellido_pempleado' => $this->faker->lastName,
            'apellido_mempleado' => $this->faker->lastName,
            'celular_empleado' => $this->faker->bothify('55########'),
            'email_empleado'  => $this->faker->unique()->safeEmail,
            'calle_empleado'  =>  $this->faker->bothify('Avenida numero ##???'),
            'codigo_postalempleado'=>  $this->faker->bothify('52###'),
            'sexo_empleado' =>  $this->faker->randomElement($array = array('Femenino','Masculino')),
            'id_tipo_empleado'   => $this->faker->numberBetween($min = 1, $max = 30),
            'id_departamento'   => $this->faker->numberBetween($min = 1, $max = 2),
            'id_municipio' =>  $this->faker->numberBetween($min = 1, $max = 3),
            'id_estado' =>  $this->faker->numberBetween($min = 2, $max = 3),
            'contratopdf'  => 'Sin contrato',
            'created_at'      => $this->faker->dateTime($max = 'now', $timezone = null),
            'updated_at'      => $this->faker->dateTime($max = 'now', $timezone = null)
        ];
    }
}
