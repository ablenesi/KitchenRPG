<?php

class User extends Eloquent {

	public static $rules = [
		'first_name' => 'required|alpha|min:3',
		'last_name' => 'required|alpha|min:3',
		'password' => 'required|min:6',
		'email' => 'required|email',		
	];

	public function recipes()
	{
		return $this->hasMany('Recipe');
	}

	public function comments(){
		return $this->hasMany('Comment');
	}
}
