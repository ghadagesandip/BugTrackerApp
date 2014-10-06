<?php

class TodosController extends \BaseController{

    public $layout = "layouts.default";

    protected $todo;

    protected $statusArray = array('Pending', 'Completed');

    public function __construct(Todo $todo){
        parent::__construct();
        $this->beforeFilter('auth',array('except'=>array('getTodos','saveTodo','getTodo','updateTodo','deleteTodo')));
        $this->todo  = $todo;

    }


    public function index(){
        $this->layout->title ="Todo";
        $todos = $this->todo->owner(Auth::user()->id)->paginate();
        $this->layout->content = View::make('Todos.index',compact('todos'));
    }




    public function create(){
        $this->layout->title="Add New Todo";
        $projects = Project::whereHas('users',function($q){$q->where('user_id','=',Auth::user()->id);})->active()->lists('name','id');
        $this->layout->content = View::make('Todos.create',compact('projects'));
    }




    
    public function store(){

        if(!$this->todo->fill($data = Input::all())->isValid()){
            Session::flash('message','Validation error occured');
            return Redirect::back()->withInput()->withErrors($this->todo->errors);
        }else{
            $this->todo->user_id = Auth::user()->id;
            $this->todo->save();
            Session::flash('message','Todo saved');
            return Redirect::to('todos');
        }
    }




    public function show($id){
        $this->layout->title ="View Todo";
        $todo = $this->todo->findOrFail($id);
        $this->layout->content = View::make('Todos.show',compact('todo'));

    }



    public function edit($id){
        $this->layout->title ="Update Todo";
        $todo = $this->todo->findOrFail($id);
        $projects = Project::active()->getProjectList();
        $this->layout->content  = View::make('Todos.edit',compact('todo','projects'));

    }


    public function update($id){
        $this->todo = $this->todo->find($id);
        if(!$this->todo->fill($input=Input::all())->isValid($id)){
            Session::flash('message','Validation error occured');
            return Redirect::back()->withInput()->withErrors($this->todo->errors);
        }else{
            if(!isset($input['Todo']['todo_status'])){
               $this->todo->todo_status = 0;
            }
            $this->todo->update($input);
            Session::flash('message','Todo updated ');
            return Redirect::to('todos');
        }
    }





    public function getTodos($userId,$projectId = null){
        if($projectId==null){
            $todos = $this->todo->owner($userId)->get();
        }else{
            $todos = $this->todo->owner($userId)->byProject($projectId)->get();
        }

        $projects = Project::whereHas('users',function($q){$q->where('user_id','=',Auth::user()->id);})->active()->lists('name','id');
        $data = array('todos'=>$todos,'projects'=>$projects);
        return Response::JSON($data);
    }




    public function saveTodo(){
        $todo = $this->todo->create(Input::all());
        return  Response::json($todo);
    }



    public function getTodo($id=null){
        $todo = $this->todo->withProject()->find($id);

        $todo['todo_status'] = $this->statusArray[$todo['todo_status']];
        return Response::JSON($todo);
    }



    public function updateTodo($id){

        if($this->todo->find($id)->update(Input::all())){
            return Response::JSON(array('message'=>'Todo updated'));
        }
    }



    public function deleteTodo($todoId){
        if($this->todo->destroy($todoId)){
            return Response::JSON(array('status'=>'success'));
        }else{
            return Response::JSON(array('status'=>'fail'));
        }
    }

}