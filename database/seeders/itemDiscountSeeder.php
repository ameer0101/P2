<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class itemDiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('discount_items')->insert([
            [
                'discount_id'=>6,
                'menu_item_id'=>1,
                'duration'=>'2023-6-17',
                'valid'=> true
            ],
            [
                'discount_id'=>5,
                'menu_item_id'=>9,
                'duration'=>'2023-6-18',
                'valid'=> true
            ],
            [
                'discount_id'=>4,
                'menu_item_id'=>18,
                'duration'=>'2023-6-19',
                'valid'=> true
            ],
        ]);
    }
}
