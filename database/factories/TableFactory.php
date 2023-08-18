<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Table;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Table>
 */
class TableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Table::class;
    public function definition(): array
    {
        return [
            'num_of_chairs' => $this->faker->numberBetween(2, 10),
            'position' => $this->faker->boolean(),
            'available' => $this->faker->boolean(),
        ];
    }
}
