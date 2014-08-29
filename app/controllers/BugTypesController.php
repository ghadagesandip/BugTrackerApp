<?php

class BugTypesController extends \BaseController {

    public $layout = 'layouts.default';

    protected $bugType;

    public function __construct(BugType $bugType){
        parent::__construct();
        $this->bugType=$bugType;
    }

	/**
	 * Display a listing of bugtypes
	 *
	 * @return Response
	 */
	public function index()
	{
        $this->layout->title="Bug Type";
		$bugtypes = $this->bugType->paginate(1);
        $this->layout->content =  View::make('bug_types.index', compact('bugtypes'));
	}




	/**
	 * Show the form for creating a new bugtype
	 *
	 * @return Response
	 */
	public function create()
	{

		$this->layout->content = View::make('bug_types.create');
	}





	/**
	 * Store a newly created bugtype in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        if(!$this->bugType->fill(Input::all())->isValid()){
            Session::flash('message','Validation error occured while saving bug type, please try again');
            return Redirect::back()->withInput()->withErrors($this->bugType->errors);
        }else{
            $this->bugType->save();
            Session::flash('message','Bug type saved');
            return Redirect::to('bug-tyepes');
        }

	}




	/**
	 * Display the specified bugtype.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$bugtype = $this->bugType->findOrFail($id);
        $this->layout->content =  View::make('bug_types.show', compact('bugtype'));
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
        $this->layout->title ="Bug type";
		$this->layout->content = View::make('bug_types.edit', compact('bugtype'));
	}

	/**
	 * Update the specified bugtype in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		if(!$this->bugType->fill(Input::all())->isValid($id)){
            Session::flash('message','Validation error occred');
            return Redirect::back()->withInput()->withErrors($this->bugType->errors);
        }else{
            $this->bugType->find($id)->update(Input::all());
            Session::flash('message','Bug type updated');
            return Redirect::route('bug-types.index');
        }

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
