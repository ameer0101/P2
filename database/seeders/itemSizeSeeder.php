<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class itemSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('item_sizes')->insert([
            //Cheese Burger Sandwich
            [
                'size_id'=>1,
                'menu_item_id'=>1,
                'price'=>15000
            ],
            [
                'size_id'=>2,
                'menu_item_id'=>1,
                'price'=>17000
            ],
            [
                'size_id'=>3,
                'menu_item_id'=>1,
                'price'=>20000
            ],
            //Shawarma Chicken Sandwich
            [
                'size_id'=>1,
                'menu_item_id'=>2,
                'price'=>10000
            ],
            [
                'size_id'=>2,
                'menu_item_id'=>2,
                'price'=>13000
            ],
            [
                'size_id'=>3,
                'menu_item_id'=>2,
                'price'=>17000
            ],
            //Shawarma Meat Sandwich
            [
                'size_id'=>1,
                'menu_item_id'=>3,
                'price'=>13000
            ],
            [
                'size_id'=>2,
                'menu_item_id'=>3,
                'price'=>15000
            ],
            [
                'size_id'=>3,
                'menu_item_id'=>3,
                'price'=>18000
            ],
            //Falafel Sandwich
            [
                'size_id'=>1,
                'menu_item_id'=>4,
                'price'=>13000
            ],
            [
                'size_id'=>2,
                'menu_item_id'=>4,
                'price'=>15000
            ],
            [
                'size_id'=>3,
                'menu_item_id'=>4,
                'price'=>18000
            ],
            //crespi Sandwich
            [
                'size_id'=>1,
                'menu_item_id'=>5,
                'price'=>17000
            ],
            [
                'size_id'=>2,
                'menu_item_id'=>5,
                'price'=>20000
            ],
            [
                'size_id'=>3,
                'menu_item_id'=>5,
                'price'=>22000
            ],
            //zinger Sandwich
            [
                'size_id'=>1,
                'menu_item_id'=>6,
                'price'=>17000
            ],
            [
                'size_id'=>2,
                'menu_item_id'=>6,
                'price'=>20000
            ],
            [
                'size_id'=>3,
                'menu_item_id'=>6,
                'price'=>22000
            ],
            //pepperoni pizza
            [
                'size_id'=>1,
                'menu_item_id'=>7,
                'price'=>20000
            ],
            [
                'size_id'=>2,
                'menu_item_id'=>7,
                'price'=>25000
            ],
            [
                'size_id'=>3,
                'menu_item_id'=>7,
                'price'=>28000
            ],
            //Mixed pizza
            [
                'size_id'=>1,
                'menu_item_id'=>8,
                'price'=>20000
            ],
            [
                'size_id'=>2,
                'menu_item_id'=>8,
                'price'=>25000
            ],
            [
                'size_id'=>3,
                'menu_item_id'=>8,
                'price'=>28000
            ],
            //Hot Dog pizza
            [
                'size_id'=>1,
                'menu_item_id'=>9,
                'price'=>20000
            ],
            [
                'size_id'=>2,
                'menu_item_id'=>9,
                'price'=>25000
            ],
            [
                'size_id'=>3,
                'menu_item_id'=>9,
                'price'=>28000
            ],
            //Four Seasons pizza
            [
                'size_id'=>1,
                'menu_item_id'=>10,
                'price'=>20000
            ],
            [
                'size_id'=>2,
                'menu_item_id'=>10,
                'price'=>25000
            ],
            [
                'size_id'=>3,
                'menu_item_id'=>10,
                'price'=>28000
            ],
            //Hummus plate
            [
                'size_id'=>1,
                'menu_item_id'=>11,
                'price'=>5000
            ],
            [
                'size_id'=>3,
                'menu_item_id'=>11,
                'price'=>7000
            ],
            //Fries plate
            [
                'size_id'=>1,
                'menu_item_id'=>12,
                'price'=>8000
            ],
            [
                'size_id'=>3,
                'menu_item_id'=>12,
                'price'=>10000
            ],
            //Vegetable Soup
            [
                'size_id'=>1,
                'menu_item_id'=>13,
                'price'=>9000
            ],
            [
                'size_id'=>3,
                'menu_item_id'=>13,
                'price'=>12000
            ],
            //strawberry Donuts
            [
                'size_id'=>4,
                'menu_item_id'=>14,
                'price'=>7000
            ],
            //vanilla Donuts
            [
                'size_id'=>4,
                'menu_item_id'=>15,
                'price'=>7000
            ],
            //chocolate Donuts
            [
                'size_id'=>4,
                'menu_item_id'=>16,
                'price'=>7000
            ],
            //chocolate waffle
            [
                'size_id'=>4,
                'menu_item_id'=>17,
                'price'=>10000
            ],
            //pan cake
            [
                'size_id'=>4,
                'menu_item_id'=>18,
                'price'=>12000
            ],
            //pepsi can
            [
                'size_id'=>4,
                'menu_item_id'=>19,
                'price'=>7000
            ],
            //pepsi cup
            [
                'size_id'=>4,
                'menu_item_id'=>20,
                'price'=>9000
            ],
            //pepsi bottle
            [
                'size_id'=>4,
                'menu_item_id'=>21,
                'price'=>12000
            ],
            //strawberry juice
            [
                'size_id'=>4,
                'menu_item_id'=>22,
                'price'=>9500
            ],
            //fanta bottle
            [
                'size_id'=>4,
                'menu_item_id'=>23,
                'price'=>12000
            ],
        ]);
    }

}
