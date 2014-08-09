<?php

class BugTypesController extends \BaseController {

    public $layout = 'layouts.default';

    protected $bugTpe;

    public function __construct(BugType $bugType){
        parent::__construct();
        $this->bugTpe=$bugType;
    }

	/**
	 * Display a listing of bugtypes
	 *
	 * @return Response
	 */
	public function index()
	{

		$bugtypes = $this->bugTpe->all();
		$this->layout->content =  View::make('bug_types.index', compact('bugtypes'));
	}

	/**
	 * Show the form for creating a new bugtype
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('bugtypes.create');
	}

	/**
	 * Store a newly created bugtype in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Bugtype::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Bugtype::create($data);

		return Redirect::route('bugtypes.index');
	}

	/**
	 * Display the specified bugtype.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$bugtype = Bugtype::findOrFail($id);

		return View::make('bugtypes.show', compact('bugtype'));
	}

	/**
	 * Show the form for editing the specified bugtype.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bugtype = Bugtype::find($id);

		return View::make('bugtypes.edit', compact('bugtype'));
	}

	/**
	 * Update the specified bugtype in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$bugtype = Bugtype::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Bugtype::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$bugtype->update($data);

		return Redirect::route('bugtypes.index');
	}

	/**
	 * Remove the specified bugtype from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Bugtype::destroy($id);

		return Redirect::route('bugtypes.index');
	}

}
