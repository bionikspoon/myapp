<?php
class Show
{
	public function allShows($order_by = FALSE, $direction = 'ASC')
	{
		$sql = 'SELECT * FROM shows';
		$sql .= $order_by ? ' ORDER BY ' . $order_by . ' ' . $direction : '';
		return DB::select($sql);
	}
}