<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
/*         return [
            'name' => fake()->name(),
            'address' => fake()->streetAddress(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'date_birth' => fake()->dateTimeBetween('-40 years', '-20 years')->format('Y-m-d'),
            'city_id' => fake()->numberBetween(1, 10)
        ]; 
        return [
            'name' => 'Robson',
            'address' => '6710 Rue Mazarin',
            'phone' => '438-866-3303',
            'email' => 'robson.duarte@gmail.com',
            'date_birth' => '1973-12-25',
            'city_id' => 1
        ];

        return [
            'name' => $this->faker->name,
            'address' => $this->faker->streetAddress,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique->safeEmail,
            'date_birth' => $this->faker->dateTimeBetween('-40 years', '-20 years')->format('Y-m-d'),
            'city_id' => $this->faker->numberBetween(1, 10)
        ]; */

    }
}
