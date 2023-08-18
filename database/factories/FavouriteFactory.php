<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Favourite;
use App\Models\Menu_item;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=App\Favourite>
 */
class FavouriteFactory extends Factory
{
    protected $model = Favourite::class;
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
        ];
    }
    public function configure()
    {
        $faker = Faker::create();

        return $this->afterMaking(function (Favourite $fav) use($faker){
            $uniquePair = $faker->unique()->randomElements([
                ['user_id' => $fav->user_id, 'menu_item_id' => $fav->menu_item_id],
                ['user_id' => User::inRandomOrder()->where('role','user')->first()->id, 'menu_item_id' => Menu_item::inRandomOrder()->first()->id],
            ])[0];

            $fav->user_id = $uniquePair['user_id'];
            $fav->menu_item_id = $uniquePair['menu_item_id'];
        });
    }
}
