<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menu_items')->insert([
            [
                'category_id'=>1,
                'name'=>'Cheese Burger Sandwich',
                'description'=>'juicy all-beef patty topped with melted cheddar cheese, fresh lettuce, tomato, pickles, and tangy ketchup and mayo. It\'s a classic American favorite that\'s sure to satisfy your cravings!',
                'image'=>'Menu_Images/burger1.png',
                'hidden'=>false
            ],
            [
                'category_id'=>1,
                'name'=>'Shawarma Chicken Sandwich',
                'description'=>'Shawarma Chicken Sandwich with mayo,pickles',
                'image'=>'Menu_Images/shawarmaChicken.png',
                'hidden'=>false
            ],
            [
                'category_id'=>1,
                'name'=>'Shawarma Meat Sandwich',
                'description'=>'Shawarma Meat Sandwich with yogurt,pickles and fresh lattece',
                'image'=>'Menu_Images/shawarmaMeat.png',
                'hidden'=>false
            ],
            [
                'category_id'=>1,
                'name'=>'Falafel Sandwich',
                'description'=>'Fried Falafel Pieces With Tomatoes,Fresh Yogurt and Lattece',
                'image'=>'Menu_Images/falafel.png',
                'hidden'=>false
            ],
            [
                'category_id'=>1,
                'name'=>'Crespi Chicken Sandwich',
                'description'=>'To make our Crespi chicken sandwich even more flavorful, we add fresh lettuce, ripe tomato slices, and creamy avocado. A drizzle of zesty chipotle mayo adds a touch of spicy goodness to the sandwich.',
                'image'=>'Menu_Images/crespi.png',
                'hidden'=>false
            ],
            [
                'category_id'=>1,
                'name'=>'Zinger Chicken Sandwich',
                'description'=>'Our Zinger sandwich is a spicy and flavorful chicken sandwich that\'s sure to satisfy your taste buds. We start with a juicy and crispy chicken fillet that\'s marinated in our signature blend of spices and herbs.',
                'image'=>'Menu_Images/zinger.png',
                'hidden'=>false
            ],
            //pizzas
            [
                'category_id'=>2,
                'name'=>'Pepperoni Pizza',
                'description'=>'The pepperoni pizza is a classic favorite that\'s perfect for any occasion. We start with a freshly made pizza crust that\'s crispy on the outside and chewy on the inside. We then add a generous amount of tangy tomato sauce that\'s made with the finest quality tomatoes and herbs.',
                'image'=>'Menu_Images/Papperoni pizza.png',
                'hidden'=>false
            ],
            [
                'category_id'=>2,
                'name'=>'Mixed Pizza',
                'description'=>'Four Sections of Pizza that Contains Olives,Mushroms,Pepperoni and Tomatoes. Fancy,Amazing and Super Tasty',
                'image'=>'Menu_Images/pizzaMixed.png',
                'hidden'=>false
            ],
            [
                'category_id'=>2,
                'name'=>'Hot Dog Pizza',
                'description'=>'hot dog pizza is a fun and unique twist on a classic favorite. We start with a freshly made pizza crust that\'s crispy on the outside and chewy on the inside. Instead of tomato sauce, we use a generous layer of tangy mustard that gives the pizza a zesty kick.',
                'image'=>'Menu_Images/pizzahotDog.png',
                'hidden'=>false
            ],
            [
                'category_id'=>2,
                'name'=>'Four Seasons Pizza',
                'description'=>'Our hot four seasons pizza is a delicious combination of flavors that\'s perfect for sharing with friends and family. We start with a freshly made pizza crust that\'s crispy on the outside and chewy on the inside. We then divide the pizza into four quadrants, each with its own unique combination of toppings.',
                'image'=>'Menu_Images/fourSeasons.png',
                'hidden'=>false
            ],
            //Entrees
            [
                'category_id'=>3,
                'name'=>'Hummus Plate',
                'description'=>'Traditional Hummus Plate Filled with Olive Oil',
                'image'=>'Menu_Images/hummus.png',
                'hidden'=>false
            ],
            [
                'category_id'=>3,
                'name'=>'French Fries Plate',
                'description'=>'Fresh Golden Fries, Very Suitable To Start With',
                'image'=>'Menu_Images/FrenchFries.png',
                'hidden'=>false
            ],
            [
                'category_id'=>3,
                'name'=>'Vegitables Soup',
                'description'=>'Our vegetable soup is a warm and comforting dish that\'s perfect for any occasion.',
                'image'=>'Menu_Images/vegitablesSoup.png',
                'hidden'=>false
            ],
            //Desserts
            [
                'category_id'=>5,
                'name'=>'Strawberry Donut',
                'description'=>'Whether you\'re looking for a quick breakfast on the go or a sweet treat to enjoy with your coffee, our strawberry donut is the perfect choice.',
                'image'=>'Menu_Images/StrawberryDonuts.png',
                'hidden'=>false
            ],
            [
                'category_id'=>5,
                'name'=>'Vanilla Donut',
                'description'=>'It\'s a delicious and indulgent snack that will leave you feeling satisfied and happy. So why not give it a try and see why it\'s one of our most popular items on the menu!',
                'image'=>'Menu_Images/vanillaDonuts.png',
                'hidden'=>false
            ],
            [
                'category_id'=>5,
                'name'=>'Chocolate Donut',
                'description'=>'Our chocolate donut is a rich and decadent treat that\'s perfect for chocolate lovers. It\'s a freshly made donut coated in a creamy chocolate glaze and topped with chocolate chips for the ultimate chocolate experience. Give it a try and satisfy your sweet tooth!',
                'image'=>'Menu_Images/ChocolateDonuts.png',
                'hidden'=>false
            ],
            [
                'category_id'=>5,
                'name'=>'Chocolate Waffle',
                'description'=>'Two Pieces of chocolate Waffle Super rich and perfect for chocolate lovers.',
                'image'=>'Menu_Images/waffle.png',
                'hidden'=>false
            ],
            [
                'category_id'=>5,
                'name'=>'Pan Cake',
                'description'=>'Four Pieces of Soft Pan Cakes Filled With Honey and Comes With a Vanilla Ice Cream Ball.',
                'image'=>'Menu_Images/panCake.png',
                'hidden'=>false
            ],
            //Drinks
            [
                'category_id'=>4,
                'name'=>'Pepsi Can',
                'description'=>'',
                'image'=>'Menu_Images/pepsiCans.png',
                'hidden'=>false
            ],
            [
                'category_id'=>4,
                'name'=>'Pepsi Cup',
                'description'=>'',
                'image'=>'Menu_Images/pepsiCup.png',
                'hidden'=>false
            ],
            [
                'category_id'=>4,
                'name'=>'Pepsi Bottle',
                'description'=>'',
                'image'=>'Menu_Images/pepsiBottle.png',
                'hidden'=>false
            ],
            [
                'category_id'=>4,
                'name'=>'Fresh Strawberry Juice',
                'description'=>'',
                'image'=>'Menu_Images/freshStrawberryJuice.png',
                'hidden'=>false
            ],
            [
                'category_id'=>4,
                'name'=>'Fanta Bottle',
                'description'=>'',
                'image'=>'Menu_Images/FantaBottle.png',
                'hidden'=>false
            ],

        ]);
    }
}
