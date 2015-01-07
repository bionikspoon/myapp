<?php 
/**
* 
*/
class Odd extends Eloquent
{
	protected $table = 'odd';

	function __construct()
	{
		
	}
	public function getIdAttribute($value)
	{
		return $this->attributes['myIDcolumn'];
	}
	public function getUsernameAttribute($value)
	{
		return $this->attributes['MyUsernameGoesHere'];
	}
	public function getEmailAttribute($value)
	{
		return $this->attributes['ThisIsAnEmail'];
	}
}