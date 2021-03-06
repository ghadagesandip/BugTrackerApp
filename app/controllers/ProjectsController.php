<?php

class ProjectsController extends \BaseController {

    public $layout = 'layouts.default';

    protected $project;

    protected $userId = null;

    public function __construct(Project $project){
        $this->project = $project;
        $this->beforeFilter('auth',array('except'=>array('getAllActiveProjectListByUser','myProjects','getProjectDetails','getProjectsAndbugType','getProjectUsers')));
        parent::__construct();
    }




	/**
	 * Display a listing of projects
	 *
	 * @return Response
	 */
	public function index()
	{
        $this->layout->title='Projects';
		$projects = $this->project->with('user')->paginate();
        $this->layout->content = View::make('projects.index', compact('projects','title'));
	}





	/**
	 * Show the form for creating a new project
	 *
	 * @return Response
	 */
	public function create()
	{
        $this->layout->title ='Add Project';
        $users = User::with('role')->lists('first_name','id');
        $this->layout->content = View::make('projects.create',compact('users'));
	}





	/**
	 * Store a newly created project in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

    	if (!$this->project->fill(Input::all())->isValid())
		{
            Session::flash('message','Validation Failed');
            return Redirect::back()->withErrors($this->project->errors)->withInput();
		}
        Session::flash('message','Project Added');
        $this->project->created_by = Auth::user()->id;
        $this->project->save();
		return Redirect::route('projects.index');

	}






	/**
	 * Display the specified project.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $this->layout->title = 'View Project';
		$project = $this->project->with('user')->findOrFail($id);
        $this->layout->content = View::make('projects.show', compact('project'));
	}






	/**
	 * Show the form for editing the specified project.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$project = $this->project->with('users')->find($id);
        $users = User::lists('first_name','id');
        //echo '<pre>'; print_r($project->toArray());exit;
        $this->layout->content=  View::make('projects.edit', compact('project','users'));
	}




	/**
	 * Update the specified project in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$this->project = $this->project->findOrFail($id);
        if(!$this->project->fill($input = Input::all())->isValid($id)){
            Session::flash('message','Validation failed try again');
            return Redirect::back()->withInput()->withErrors($this->project->errors);
        }
        Session::flash('message','Project details updated');
        if(!isset($input['Project']['is_active'])){
            $this->project->is_active = 0;
        }
        //echo "<pre>"; print_r($input['user_id']);exit;
        $this->project->update($input);
        $this->project->users()->sync($input['user_id']);
        return Redirect::route('projects.index');
	}







	/**
	 * Remove the specified project from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Session::flash('message',' Project Deleted');
        $this->project->destroy($id);
		return Redirect::back();
	}



    public function getAllActiveProjectListByUser($userId){
        $projects = $this->project->active()->select('id','name')->get();
        return Response::JSON($projects);
    }




    public function myProjects($userId){
        $this->userId = $userId;
        $data = array('status'=>false);
        try{
            $projects = $this->project->byUser($userId)->active()->get();
            $todogroups = TodoGroup::grouplist();
            $todoPriority = TodoPriority::getPriorities();
            $data['status'] =true;
            $data['data'] = array('projects'=>$projects,'todogroups'=>$todogroups,'todoPriority'=>$todoPriority);
        }catch (Exception $e){
            $data['error'] = $e->getMessage();
            $data['data'] = array();
        }


        return Response::JSON($data);
    }




    public function getProjectDetails($id){
        $project = $this->project->with(array('users','users.role'))->find($id);
        return Response::JSON($project);
    }


    public function getProjectsAndbugType($userId){
        $projects = $this->project->byUser($userId)->active()->get(array('id','name'));
        $bugtypes = BugType:: get(array('id','name'));
        return Response::JSON(array('projects'=>$projects,'bugtypes'=>$bugtypes));
    }



    public function getProjectUsers($projectId){
        $users  = $this->project->find($projectId)->users()->get(array('users.id','first_name','last_name'));
        $user1 = array();
        foreach($users as $user){
            array_push($user1,array('id'=>$user['id'],'name'=>$user['first_name']." ".$user['last_name']));
        }
        return Response::JSON($user1);
    }

}
