<?php
class Show
{
	public function allShows($order_by = FALSE, $direction = 'ASC')
	{
		$shows = DB::table('shows');
		return $order_by ? $shows->orderBy($order_by, $direction)->get() : $shows->get();
	}
}