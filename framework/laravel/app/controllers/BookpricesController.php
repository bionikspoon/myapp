<?php

class BookpricesController extends \BaseController {

	/**
	 * Display a listing of bookprices
	 *
	 * @return Response
	 */
	public function index()
	{
		$bookprices = Bookprice::all();

		return View::make('bookprices.index', compact('bookprices'));
	}

	/**
	 * Show the form for creating a new bookprice
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('bookprices.create');
	}

	/**
	 * Store a newly created bookprice in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Bookprice::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Bookprice::create($data);

		return Redirect::route('bookprices.index');
	}

	/**
	 * Display the specified bookprice.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$bookprice = Bookprice::findOrFail($id);

		return View::make('bookprices.show', compact('bookprice'));
	}

	/**
	 * Show the form for editing the specified bookprice.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bookprice = Bookprice::find($id);

		return View::make('bookprices.edit', compact('bookprice'));
	}

	/**
	 * Update the specified bookprice in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$bookprice = Bookprice::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Bookprice::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$bookprice->update($data);

		return Redirect::route('bookprices.index');
	}

	/**
	 * Remove the specified bookprice from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Bookprice::destroy($id);

		return Redirect::route('bookprices.index');
	}

}
