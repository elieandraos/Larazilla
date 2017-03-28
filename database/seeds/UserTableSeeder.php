<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->cleanUp('users');

		User::create([
			"email" => "elieandraos31@gmail.com",
			"name" => "Elie Andraos",
			"password" => Hash::make("123456"),
		]);

        User::create([
            "email" => "tamamsalam@admin.com",
            "name" => "Administrator",
            "password" => Hash::make("123456"),
        ]);

        User::create([
            "email" => "team@tammamsalam.net",
            "name" => "Administrator",
            "password" => Hash::make("TS_team@1945"),
        ]);
    }

}