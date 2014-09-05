<?php

class RolesController extends \BaseController {

    protected $role;

    public function __construct(Role $role){

        $this->role= $role;
        parent::__construct();
        $this->beforeFilter('auth',array('except'=>array('getRolesList','getRole','savePost')));

    }


    public $layout = 'layouts.default';
	/**
	 * Display a listing of roles
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles = Role::all();
        $this->layout->title ="Roles";
		$this->layout->content = View::make('roles.index', compact('roles'));
	}

	/**
	 * Show the form for creating a new role
	 *
	 * @return Response
	 */
	public function create()
	{
        $this->layout->title="New Role";
		$this->layout->content = View::make('roles.create');
	}

	/**
	 * Store a newly created role in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		if(!$this->role->fill(Input::all())->isValid(null)){
            Session::flash('message','Validation error occured while adding role');
            return Redirect::back()->withInput()->withErrors($this->role->errors);
        }else{
            $this->role->save();
            Session::flash('message','Role added successfully');
            return Redirect::route('roles.index');
        }
	}



	/**
	 * Display the specified role.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$role = Role::findOrFail($id);
        $this->layout->title = 'Add Role';
		$this->layout->content  = View::make('roles.show', compact('role'));
	}

	/**
	 * Show the form for editing the specified role.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$role = Role::find($id);
        $this->layout->title="Update Role";
		$this->layout->content =  View::make('roles.edit', compact('role'));
	}




	/**
	 * Update the specified role in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if(!$this->role->fill(Input::all())->isValid($id)){
            Session::flash('message','Validation error occured');
            return Redirect::back()->withInput()->withErrors($this->role->errors);
        }else{
            Session::flash('message','Role updated');
            return Redirect::to('roles');
        }
		return Redirect::route('roles.index');
	}

	/**
	 * Remove the specified role from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Role::destroy($id);
        Session::flash('message','Role deleted');
		return Redirect::route('roles.index');
	}



    public function getRolesList(){
        $roles =  $this->role->all();
        //echo '<pre>'; print_r($roles->toArray());exit;
        return Response::json($roles);
    }



    public function getRole($id){
        $role =$this->role->find($id);
        return Response::json($role);
    }

    public function addPost(){

    }



    public function savePost(){

        if(!$this->role->fill(Input::all())->isValid()){
             return Response::json(array('error'=>'Validation error occured','success'=>false));
        }else{
            if($this->role->save()){
                return Response::json(array('error'=>'Role added succesfully','success'=>true));
            }else{
                return Response::json(array('error'=>'Error occured while saving','success'=>false));
            }

        }
    }
}
