<?php

namespace Database\Factories;

use App\Models\Vacina;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacinaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vacina::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => ucfirst($this->faker->unique()->word()),
            'fabricante' => $this->faker->company(),
            'doses' => $this->faker->numberBetween(1, 3),
        ];
    }
}
