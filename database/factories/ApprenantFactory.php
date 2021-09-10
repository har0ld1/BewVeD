<?php

namespace Database\Factories;

use App\Models\Apprenant;
use Illuminate\Database\Eloquent\Factories\Factory;


class ApprenantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Apprenant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lastname' => $this->faker->lastName(),
            'firstname' => $this->faker->firstName(),
            'email' => $this->faker->unique()->safeEmail,
            'gender' => 'femme',
            'age' =>'20'
        ];
    }
}
