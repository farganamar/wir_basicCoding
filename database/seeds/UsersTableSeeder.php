<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        for ($i=0; $i < 6 ; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make("admin123"),
                'jabatan' => "merchant",
            ]);
        }

        for ($i=0; $i < 11 ; $i++) {
            DB::table('users')->insert([
                'name' =>$faker->name,
                'email' => $faker->email,
                'password' => Hash::make("user123456"),
                'jabatan' => "customer",
            ]);
        }
    }
}
