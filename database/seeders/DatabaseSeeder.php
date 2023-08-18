<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Rate;
use App\Models\Favourite;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminSeeder::class);
        User::factory()->count(50)->create();
        $this->call(SizesSeeder::class);
        $this->call(DiscountSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(itemSizeSeeder::class);
        $this->call(itemDiscountSeeder::class);
        Rate::factory()->count(140)->create();
        Favourite::factory()->count(50)->create();
<<<<<<< HEAD
=======
        $this->call(TablesSeeder::class);
>>>>>>> project1/main
    }
}
