<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MiembroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre_apellido'=>fake()->name,
            'genero'=>'masculino',
            'direccion'=>fake()->address,
            'telefono'=>random_int(900000000,980000000),
            'fecha_nacimiento'=>fake()->date($format ='Y-m-d',$max='now'),
            'estado'=> '1',
            'ministerio'=> 'pastoral',
           // 'fotografia'=> Str::Random(20). '.jpg',
            'email'=> fake()->unique()->safeEmail(),
            'fecha_ingreso'=> fake()->date($format ='Y-m-d'),
        ];
    }
}
