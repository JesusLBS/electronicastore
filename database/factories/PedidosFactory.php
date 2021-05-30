<?php

namespace Database\Factories;

use App\Models\pedidos;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedidosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = pedidos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fecha_pedido' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'fechaentrega_pedido' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'hora_pedido'      => $this->faker->dateTime($max = 'now', $timezone = null),
            'estatus'      => 'Sin Definir',
            'total'       => $this->faker->bothify('1####'),
            'total_piezas'       => $this->faker->bothify('##'),
            'id'    => $this->faker->numberBetween($min = 33, $max = 34),
            'remember_token'      => $this->faker->dateTime($max = 'now', $timezone = null),
            'created_at'      => $this->faker->dateTime($max = 'now', $timezone = null),
            'updated_at'      => $this->faker->dateTime($max = 'now', $timezone = null)
        ];
    }
}





