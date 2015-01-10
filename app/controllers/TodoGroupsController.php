<?php

class TodoGroupsController extends \BaseController {

    public $layout = "layouts.default";


    public function __construct(TodoGroup $todoGroup){
        $this->beforeFilter('auth',array('except'=>array('getGroupList')));
        $this->todoGroup = $todoGroup;
        parent::__construct();
    }



    public function getGroupList(){
        $data = array('status'=>true);
        $data['list'] = $this->todoGroup->getlist();
        return Response::JSON($data);
    }


	/**
	 * Display a listing of the resource.
	 * GET /todo_groups
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /todo_groups/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /todo_groups
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /todo_groups/{id}
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
	 * GET /todo_groups/{id}/edit
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
	 * PUT /todo_groups/{id}
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
	 * DELETE /todo_groups/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}