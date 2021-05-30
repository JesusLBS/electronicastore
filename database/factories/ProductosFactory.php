<?php

namespace Database\Factories;

use App\Models\productos;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = productos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_producto' => $this->faker->bothify('Producto ????'),
            'descripcion_producto' => $this->faker->bothify('Descripcion ????'),
            'numserie_producto' => $this->faker->bothify('#####'),
            'preciocompra_producto' => $this->faker->bothify('#####'),
            'precioventa_producto' => $this->faker->bothify('#####'),
            'garantiatienda_producto' => $this->faker->numberBetween($min = 1, $max = 0),
            'id_pcategoria' => '1',
            'id_marca' => $this->faker->numberBetween($min = 1, $max = 2),
            'id_proveedor' => '1',
            'imgpr' => 'psinfoto.png',
            'created_at'      => $this->faker->dateTime($max = 'now', $timezone = null),
            'updated_at'      => $this->faker->dateTime($max = 'now', $timezone = null)
        ];
    }
}
