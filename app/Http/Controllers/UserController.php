<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;

class UserController extends Controller{
	public function all(){
		return response([
			"status" => true,
			"users" => User::all()
		], 200);
	}

	public function show($id){
		$user = User::find($id);
		if($user){
			return response([
				"status" => true,
				"user" => $user
			], 200);
		}else{
			return response([
				"status" => false,
				"message" => "user not found"
			], 200);
		}
	}

	public function create(Request $request){
		$request['password'] = bcrypt($request['password']);
		$isEmailExist = User::where('email', $request['email'])->first();
		if(!$isEmailExist){
			if(User::create($request->all())){
				return response([
					"status" => true,
					"message" => "success add user"
				], 200);
			}else{
				return response([
					"status" => false,
					"message" => "failed add user"
				], 200);
			}
		}else{
			return response([
				"status" => false,
				"message" => "email already exist"
			], 200);
		}
	}

	public function update(Request $request, $id){
		$user = User::find($id);
		$isEmailExist = User::where([
			['email', "=", $request["email"]],
			['id_user', "<>", $id],
		], ["and"])->first();
		if(!$isEmailExist){
			if($user){
				$request['password'] = bcrypt($request['password']);
				$user->update($request->all());
				return response([
					"status" => true,
					"message" => "success edit user",
					"user" => $user
				], 200);
			}else{
				return response([
					"status" => false,
					"message" => "user not found",
				], 200);
			}
		}else{
			return response([
				"status" => false,
				"message" => "email already exist",
			], 200);
		}
	}

	public function delete(Request $request, $id){
		$user = User::find($id);
		if($user){
			$user->delete();
			return response([
				"status" => true,
				"message" => "success delete user",
				"user" => $user
			], 200);
		}else{
			return response([
				"status" => false,
				"message" => "user not found"
			], 200);
		}
	}
}
