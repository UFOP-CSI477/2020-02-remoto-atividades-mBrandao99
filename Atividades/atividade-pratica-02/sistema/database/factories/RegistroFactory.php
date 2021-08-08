<?php

namespace Database\Factories;

use App\Models\Equipamento;
use App\Models\Registro;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegistroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Registro::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'equipamento_id' => Equipamento::factory(),
            'user_id' => User::factory(),
            'descricao' => $this->faker->sentence($nbWords = 10, $variableNbWords = true),
            'datalimite' => $this->faker->date(),
            'tipo' => $this->faker->numberBetween($min = 1, $max = 3),
        ];
    }
}
