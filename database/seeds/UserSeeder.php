<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder{
	public function run(){
		$users = [[
			"name" => "Irsyad Abdul",
			"email" => "abdulirsyad15@gmail.com",
			"password" => "12345678"
		],[
			"name" => "Afina Erma",
			"email" => "afinaerma99@gmail.com",
			"password" => "12345678"
		],[
			"name" => "Stephen Curry",
			"email" => "wardellcurry30@gmail.com",
			"password" => "12345678"
		],[
			"name" => "LeBron James",
			"email" => "kingjames23@gmail.com",
			"password" => "12345678"
		]];

		foreach($users as $user){
			$user["password"] = bcrypt($user["password"]);
			DB::table("tb_users")->insert($user);
		}
	}
}
