<?php

class BugsController extends \BaseController {

    protected $layout = 'layouts.default';

    protected $bug;

    public function __construct(Bug $bug){
        $this->bug = $bug;
    }

	/**
	 * Display a listing of bugs
	 *
	 * @return Response
	 */
	public function index()
	{
		$bugs = $this->bug->paginate();

        $this->layout->title="Bug";
		$this->layout->content  = View::make('bugs.index', compact('bugs'));
	}

	/**
	 * Show the form for creating a new bug
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('bugs.create');
	}

	/**
	 * Store a newly created bug in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Bug::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Bug::create($data);

		return Redirect::route('bugs.index');
	}

	/**
	 * Display the specified bug.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$bug = Bug::findOrFail($id);

		return View::make('bugs.show', compact('bug'));
	}

	/**
	 * Show the form for editing the specified bug.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bug = Bug::find($id);

		return View::make('bugs.edit', compact('bug'));
	}

	/**
	 * Update the specified bug in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$bug = Bug::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Bug::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$bug->update($data);

		return Redirect::route('bugs.index');
	}

	/**
	 * Remove the specified bug from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Bug::destroy($id);

		return Redirect::route('bugs.index');
	}

}