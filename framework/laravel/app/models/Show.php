<?php
class Show extends Eloquent
{
	public function allShows($order_by = FALSE, $direction = 'ASC')
	{
		$shows = DB::table('shows');
		return $order_by ? $shows->orderBy($order_by, $direction)->get() : $shows->get();
	}
	public function getTopShows()
	{
		return $this->where('rating', '>', 5)->orderBy('rating', 'DESC')->get();
	}
}