<?php

namespace Database\Factories;

use App\Models\client;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientFactory extends Factory
{
    protected $model = Client::class;

    public function definition()
    {
        $tipoIdentificacion = $this->faker->randomElement(['CC', 'CE', 'Otro']);

        return [
            'nombre' => $this->faker->name,
            'apellidos' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'tipo_identificacion' => $tipoIdentificacion,
            'numero_identificacion' => $this->faker->numberBetween(10000000, 99999999),
        ];
    }
}