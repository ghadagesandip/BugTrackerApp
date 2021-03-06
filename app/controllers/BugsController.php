<?php

class BugsController extends \BaseController {

    protected $layout = 'layouts.default';

    protected $bug;

    public function __construct(Bug $bug){
        $this->beforeFilter('auth',array('except'=>array('addBug','getBugDetails')));
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
        $bugTypes = BugType::getBugTypeList();
        $bugStatuses = BugStatus::getBugStatusList();
        $assignTo = User::getProgrammerDesigner()->getList();

        $this->layout->title="Add Bug";
    	$this->layout->content = View::make('bugs.create',compact('bugTypes','bugStatuses','assignTo','getAllBugs'));
	}

	/**
	 * Store a newly created bug in storage.
	 *
	 * @return Response
	 */
	public function store()
	{


        if(!$this->bug->fill(Input::all())->isValid()){
            Session::flash('message','Validation error occurred');
            return Redirect::back()->withErrors($this->bug->errors)->withInput();
        }else{
            if($this->bug->save(Input::all())){
                Session::flash('message','Bug added to list');
                return Redirect::to('/bugs');
            }else{
                Session::flash('message','Could not saved, please try again');
            }
        }

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


    public function getAllBugs($userId){
        $bugs =   $this->bug->with('bugType','bugStatus','assignedBy')->where('assigned_to','=',$userId)->orWhere('assigned_by', $userId)->get();
        $projects = Project::byUser($userId)->active()->lists('name','id');
        
        return Response::JSON(array('bugs'=>$bugs,'projects'=>$projects));
    }


    public function addBug(){
        //echo '<pre>'; print_r(Input::all());exit;
        if(!$this->bug->fill(Input::all())->isValid()){
            return Response::JSON(array('status'=>'failed','message'=>'validation error occured','errors'=>$this->bug->errors));
        }else{
            if($this->bug->save(Input::all())){
                return Response::JSON(array('status'=>'success','message'=>'bug added to list'));
            }else{
                return Response::JSON(array('status'=>'failed','message'=>'failed to save'));
            }
        }
    }


    public function getBugDetails($id){
        $bug = $this->bug->find($id);
        return Response::JSON($bug);
    }
}
