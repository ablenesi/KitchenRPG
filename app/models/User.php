<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface{


	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
	    return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
	    return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
	    return $this->email;
	}

	public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}
	
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
