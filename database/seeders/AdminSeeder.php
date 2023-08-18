<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name'=>'ahmad',
                'email'=>'ahmad@gmail.com',
                'password'=>bcrypt('12345678'),
                'role'=> 'admin',
                'phone'=> '0946136677',
            ],
            [
                'name'=>'test',
                'email'=>'test@gmail.com',
                'password'=>bcrypt('12345678'),
                'role'=> 'user',
                'phone'=> '0946136688',
            ],
        ]);
    }
}
