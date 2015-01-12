<?php

class User extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'email' => 'required|email|unique:users,email',
		'password' => 'required|min:6'
	];

	// Don't forget to fill this array
	protected $fillable = ['email', 'password'];

}