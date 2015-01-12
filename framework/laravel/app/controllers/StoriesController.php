<?php

class StoriesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /books
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		//
		return View::make('books.index');
	}

	public function getBooks()
	{
		$books = [
			'Alice in Wonderland',
			'Tom Sawyer',
			'Gulliver\'s Travels',
			'Dracula',
			'Leaves of Grass'
		];
		return Response::json($books);
	}
	/**
	 * Show the form for creating a new resource.
	 * GET /books/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /books
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /books/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /books/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /books/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /books/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}