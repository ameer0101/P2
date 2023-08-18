<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Rate;
use App\Models\Menu_item;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=App\Rate>
 */
class RateFactory extends Factory
{
    protected $model = Rate::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->where('role','user')->first(),
            'menu_item_id'=> Menu_item::inRandomOrder()->first(),
            'stars'=> fake()->numberBetween(1,5),
        ];
    }
    public function configure()
    {
        $faker = Faker::create();

        return $this->afterMaking(function (Rate $rate) use($faker){
            $uniquePair = $faker->unique()->randomElements([
                ['user_id' => $rate->user_id, 'menu_item_id' => $rate->menu_item_id],
                ['user_id' => User::inRandomOrder()->where('role','user')->first()->id, 'menu_item_id' => Menu_item::inRandomOrder()->first()->id],
            ])[0];

            $rate->user_id = $uniquePair['user_id'];
            $rate->menu_item_id = $uniquePair['menu_item_id'];
        });
    }
}
