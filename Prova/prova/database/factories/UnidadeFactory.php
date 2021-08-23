<?php

namespace Database\Factories;

use App\Models\Unidade;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnidadeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Unidade::class;

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    public function withFaker()
    {
        return \Faker\Factory::create('pt_BR');
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $prefixos = array("Hospital ", "Posto ", "Centro de Saúde " );
        $i = array_rand($prefixos);
        return [
            'nome' => $prefixos[$i] . $this->faker->lastName(),
            'bairro' => $this->faker->cityPrefix(),
            'cidade' => $this->faker->city(),
        ];
    }
}
