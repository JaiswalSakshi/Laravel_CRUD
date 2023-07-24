<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //php artisan make:seeder UserSeeder
        
        DB::table('users')->insert([
            'name'=>'sakshi',
            'email' => 'sakshi@gmail.com',
            'username'=>'sj',
            'password'=>Hash::make('sakshi123'),
            'avatar'=>'01.jpg',
            'birthdate'=>'2000-05-02',
            'address'=>'bajrang nagar',
            'gender'=>'female',
            'hobbies'=>'music',
        ]);
    }
}
