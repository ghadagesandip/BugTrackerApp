<?php

class TodoPrioritiesController extends \BaseController {

    public function __construct(TodoPriority $todoPriority){
        parent::__construct();
        $this->todoPriority = $todoPriority;
        $this->beforeFilter('auth',array('except'=>array('getPriorityList')));
    }


    public function getPriorityList(){
        $data = array('status'=>false);

        try{
            $data['list'] =  $this->todoPriority->getTodoPriorities();
            $data['status'] = 'success';
        }catch (Exception $e){
            $data['error'] = $e->getMessage();
        }

        return Response::json($data);
    }

	/**
	 * Display a listing of the resource.
	 * GET /todopriorities
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /todopriorities/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /todopriorities
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /todopriorities/{id}
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
	 * GET /todopriorities/{id}/edit
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
	 * PUT /todopriorities/{id}
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
	 * DELETE /todopriorities/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}