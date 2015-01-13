<?php

class Account extends Eloquent {
	protected $fillable = [];
	protected $table = 'accounts';
	public $timestamps = false;

	public function setBusinessAttribute($business)
	{
		$this->attributes['business'] = Crypt::encrypt($business);
	}
	public function setTotalRevenueAttribute($total_revenue)
	{
		$this->attributes['total_revenue'] = Crypt::encrypt($total_revenue);
	}
	public function setProjectedRevenueAttribute($projected_revenue)
	{
		$this->attributes['projected_revenue'] = Crypt::encrypt($projected_revenue);
	}

	public function getBusinessAttribute()
	{
		return Crypt::decrypt($this->attributes['business']);
	}
	public function getTotalRevenueAttribute()
	{
		return number_format(Crypt::decrypt($this->attributes['total_revenue']));
	}
	public function getProjectedRevenueAttribute()
	{
		return number_format(Crypt::decrypt($this->attributes['projected_revenue']));
	}
}