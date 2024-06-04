<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "saskehhhh",
            "username" => "saskehhh",
            "phone" => "08877665544",
            "role" => "admin",
            "gender" => "Male",
            "addres" => "Karanganyar",
            "email" => "naruhina@mail.com",
            "password" => bcrypt("password")
        ]);
        User::factory(5)->create();
        Product::factory(5)->create();

    }
}
