<?php

class BugStatusesController extends \BaseController {


    protected $layout = 'layouts.default';


	/**
	 * Display a listing of bugstatuses
	 *
	 * @return Response
	 */

    protected $bugStatus;


    public function __construct(BugStatus $bugStatus){
        $this->bugStatus = $bugStatus;
    }





	public function index()
	{
		$bugstatuses = $this->bugStatus->all();
        $this->layout->title ="Bug Status";
		$this->layout->content = View::make('bug-statuses.index', compact('bugstatuses'));
	}




	/**
	 * Show the form for creating a new bugstatus
	 *
	 * @return Response
	 */
	public function create()
	{
        $this->layout->title ="Add New Status";
		$this->layout->content= View::make('bug-statuses.create');
	}





	/**
	 * Store a newly created bugstatus in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        if(!$this->bugStatus->fill(Input::all())->isValid()){
            Session::flash('message','Validation error occured');
            return Redirect::back()->withInput()->withErrors($this->bugStatus->errors);
        }else{
            $this->bugStatus->save();
            Session::flash('message','Created bug Status');
            return Redirect::to('bug-statuses');
        }
	}

	/**
	 * Display the specified bugstatus.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$bugStatus = $this->bugStatus->findOrFail($id);
        $this->layout->title = "View Bug Status";
		$this->layout->content = View::make('bug-statuses.show', compact('bugStatus'));
	}

	/**
	 * Show the form for editing the specified bugstatus.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bugStatus = $this->bugStatus->find($id);
        $this->layout->title ="Bug Type";
		$this->layout->content = View::make('bug-statuses.edit', compact('bugStatus'));
	}

	/**
	 * Update the specified bugstatus in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        if(!$this->bugStatus->fill(Input::all())->isValid($id)){
            Session::flash('message','Validation error occured');
            return Redirect::back()->withinput()->withErrors($this->bugStatus->errors);
        }else{
            $this->bugStatus->find($id)->update(Input::all());
            Session::flash('message','Bug status updated');
            return Redirect::to('bug-statuses');
        }
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
