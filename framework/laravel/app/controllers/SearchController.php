<?php

class SearchController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /search
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		return View::make('search.index');
	}
	/**
	 * Show the form for creating a new resource.
	 * GET /search/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /search
	 *
	 * @return Response
	 */
	public function postSearch()
	{
		$return = [];
		$term = Input::get('term');
		$books = [
			['name' => 'Alice in Wonderland', 'author' => 'Lewis Carroll'],
			['name' => 'Tom Sawyer', 'author' => 'Mark Twain'],
			['name' => 'Gulliver\'s Travels', 'author' => 'Jonathan Swift'],
			['name' => 'The Art of War', 'author' => 'Sunzi'],
			['name' => 'Dracula', 'author' => 'Bram Stoker'],
			['name' => 'War and Peace', 'author' => 'Leo Tolstoy'],
		];
		foreach ($books as $book) {
			if (stripos($book['name'], $term) !== false) {
				$return[] = $book;
			}
		}
		return Response::json($return);
	}

	/**
	 * Display the specified resource.
	 * GET /search/{id}
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
	 * GET /search/{id}/edit
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
	 * PUT /search/{id}
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
	 * DELETE /search/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}