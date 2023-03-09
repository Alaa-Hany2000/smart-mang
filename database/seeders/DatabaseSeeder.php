<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,10) as $index) {
            DB::table('customers')->insert([
                'name' => $faker->name,
                'email'=> $faker->email,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'info' => $faker->text(190),

            ]);
        }
    }
}
