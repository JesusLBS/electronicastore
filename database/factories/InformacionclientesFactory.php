<?php

namespace Database\Factories;

use App\Models\informacionclientes;
use Illuminate\Database\Eloquent\Factories\Factory;

class InformacionclientesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = informacionclientes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_cliente' =>  $this->faker->firstName($gender = 'male'|'female'),
            'apellido_pcliente' => $this->faker->lastName,
            'apellido_mcliente' => $this->faker->lastName,
            'direccion_cliente'  =>  $this->faker->bothify('Avenida numero ##???'),
            'colonia_cliente'  =>  $this->faker->bothify('Colonia S????'),
            'ciudad_cliente'  =>  $this->faker->bothify('Ciudad ????'),
            'codigo_postalcliente'=>  $this->faker->bothify('52###'),
            'sexo_cliente' =>  $this->faker->randomElement($array = array('F','M')),
            'email_cliente'  => $this->faker->unique()->safeEmail,
            'celular_cliente' => $this->faker->bothify('55########'),
            'id_estado'   => $this->faker->numberBetween($min = 2, $max = 3),
            'id_municipio' =>  $this->faker->numberBetween($min = 1, $max = 3),
            'id_via'   => $this->faker->numberBetween($min = 1, $max = 2),
            'id' =>  $this->faker->numberBetween($min = 33, $max = 100),
            'created_at'      => $this->faker->dateTime($max = 'now', $timezone = null),
            'updated_at'      => $this->faker->dateTime($max = 'now', $timezone = null)
        ];
    }
}


 












