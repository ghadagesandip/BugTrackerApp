<?php

class BugStatusesController extends \BaseController {

	/**
	 * Display a listing of bugstatuses
	 *
	 * @return Response
	 */
	public function index()
	{
		$bugstatuses = Bugstatus::all();

		return View::make('bugstatuses.index', compact('bugstatuses'));
	}

	/**
	 * Show the form for creating a new bugstatus
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('bugstatuses.create');
	}

	/**
	 * Store a newly created bugstatus in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Bugstatus::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Bugstatus::create($data);

		return Redirect::route('bugstatuses.index');
	}

	/**
	 * Display the specified bugstatus.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$bugstatus = Bugstatus::findOrFail($id);

		return View::make('bugstatuses.show', compact('bugstatus'));
	}

	/**
	 * Show the form for editing the specified bugstatus.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bugstatus = Bugstatus::find($id);

		return View::make('bugstatuses.edit', compact('bugstatus'));
	}

	/**
	 * Update the specified bugstatus in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$bugstatus = Bugstatus::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Bugstatus::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$bugstatus->update($data);

		return Redirect::route('bugstatuses.index');
	}

	/**
	 * Remove the specified bugstatus from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Bugstatus::destroy($id);

		return Redirect::route('bugstatuses.index');
	}

}
