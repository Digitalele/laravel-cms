<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    		DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        $faker = Factory::create();
        DB::table('users')->insert([
					[
							'name' => "Gabri",
							'slug' => "gabri-dolfi",
							'email' => "gabri@gabri.com",
							'password' => bcrypt('secret'),
							'bio' => $faker->text(rand(250, 300))
					],
					[
							'name' => "Marce",
							'slug' => "marce-tinghi",
							'email' => "marce@marce.com",
							'password' => bcrypt('secret'),
							'bio' => $faker->text(rand(250, 300))
					],
					[
							'name' => "Ale",
							'slug' => "ale-dolfi",
							'email' => "ale@ale.com",
							'password' => bcrypt('secret'),
							'bio' => $faker->text(rand(250, 300))
					],
        ]);
    }
}
