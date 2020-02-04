<?php

use Illuminate\Database\Seeder;

class DrinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $drinks = [
            ['name' => 'Es Teh Manis','price' => '3000'],
            ['name' => 'Es Jeruk','price' => '4000'],
            ['name' => 'Jus Alpukat','price' => '9000'],
            ['name' => 'Jus Mangga','price' => '8000'],
        ];
        foreach($drinks as $drink){
			DB::table("tb_drinks")->insert($drink);
		}
    }
}
