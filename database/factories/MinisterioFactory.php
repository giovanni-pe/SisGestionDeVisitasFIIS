<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ministerio>
 */
class MinisterioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre_ministerio'=>fake()->lastName,
            'descripcion'=>fake()->realTextBetween($maxNbChars=30),
            'estado'=>"1",
            'fecha_ingreso'=>fake()->date($format='Y-m-d',$max='now')
        ];
    }
}
