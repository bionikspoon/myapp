<?php

class SpaceshipsController extends \BaseController {

	/**
	 * Display a listing of spaceships
	 *
	 * @return Response
	 */
	public function index()
	{
		$spaceships = Spaceship::all();

		return View::make('spaceships.index', compact('spaceships'));
	}

	/**
	 * Show the form for creating a new spaceship
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('spaceships.create');
	}

	/**
	 * Store a newly created spaceship in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Spaceship::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Spaceship::create($data);

		return Redirect::route('spaceships.index');
	}

	/**
	 * Display the specified spaceship.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$spaceship = Spaceship::findOrFail($id);

		return View::make('spaceships.show', compact('spaceship'));
	}

	/**
	 * Show the form for editing the specified spaceship.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$spaceship = Spaceship::find($id);

		return View::make('spaceships.edit', compact('spaceship'));
	}

	/**
	 * Update the specified spaceship in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$spaceship = Spaceship::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Spaceship::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$spaceship->update($data);

		return Redirect::route('spaceships.index');
	}

	/**
	 * Remove the specified spaceship from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Spaceship::destroy($id);

		return Redirect::route('spaceships.index');
	}

}
