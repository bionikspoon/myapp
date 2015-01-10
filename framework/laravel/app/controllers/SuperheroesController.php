<?php
// TODO: finish views
class SuperheroesController extends \BaseController {
	protected $layout = 'layouts.master';


	/**
	 * Display a listing of superheroes
	 *
	 * @return Response
	 */
	public function index()
	{
		$superheroes = Superhero::all();

		return View::make('superheroes.index', compact('superheroes'));
	}

	/**
	 * Show the form for creating a new superhero
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('superheroes.create');
	}

	/**
	 * Store a newly created superhero in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Superhero::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Superhero::create($data);

		return Redirect::route('superheroes.index');
	}

	/**
	 * Display the specified superhero.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$superhero = Superhero::findOrFail($id);

		return View::make('superheroes.show', compact('superhero'));
	}

	/**
	 * Show the form for editing the specified superhero.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$superhero = Superhero::find($id);

		return View::make('superheroes.edit', compact('superhero'));
	}

	/**
	 * Update the specified superhero in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$superhero = Superhero::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Superhero::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$superhero->update($data);

		return Redirect::route('superheroes.index');
	}

	/**
	 * Remove the specified superhero from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Superhero::destroy($id);

		return Redirect::route('superheroes.index');
	}

}
