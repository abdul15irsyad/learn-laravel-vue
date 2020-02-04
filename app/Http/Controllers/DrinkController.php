<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drink as Drink;

class DrinkController extends Controller{
    public function all(){
		return response([
			"status" => true,
			"drinks" => Drink::all()
		], 200);
	}

	public function show($id){
		$drink = Drink::find($id);
		if($drink){
			return response([
				"status" => true,
				"drink" => $drink
			], 200);
		}else{
			return response([
				"status" => false,
				"message" => "drink not found"
			], 200);
		}
	}
	
	public function create(Request $request){
		$create = Drink::create($request->all());
		if($create){
				return response()->json([
						"status" => true,
						"message" => "success add drink",
						"data" => $create
				], 200);
		}else{
				return response([
						"status" => false,
						"message" => "failed add drink"
				], 200);
		}
	}

	public function update(Request $request, $id){
		$drink = Drink::find($id);
		if($drink){
				$drink->update($request->all());
				return response([
						"status" => true,
						"message" => "success edit drink",
						"drink" => $drink
				], 200);
		}else{
				return response([
						"status" => false,
						"message" => "drink not found",
				], 200);
		}
	}

	public function delete(Request $request, $id){
		$drink = Drink::find($id);
		if($drink){
			$drink->delete();
			return response([
				"status" => true,
				"message" => "success delete drink",
				"drink" => $drink
			], 200);
		}else{
			return response([
				"status" => false,
				"message" => "drink not found"
			], 200);
		}
	}
}
