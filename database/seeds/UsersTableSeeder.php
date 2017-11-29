<?php

use Illuminate\Database\Seeder;

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

        DB::table('users')->insert([
					[
							'name' => "Gabri",
							'slug' => "gabri-dolfi",
							'email' => "gabri@gabri.com",
							'password' => bcrypt('secret')
					],
					[
							'name' => "Marce",
							'slug' => "marce-tinghi",
							'email' => "marce@marce.com",
							'password' => bcrypt('secret')
					],
					[
							'name' => "Ale",
							'slug' => "ale-dolfi",
							'email' => "ale@ale.com",
							'password' => bcrypt('secret')
					],
        ]);
    }
}
