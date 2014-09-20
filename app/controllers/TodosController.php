<?php

class TodosController extends \BaseController{

    public $layout = "layouts.default";

    protected $todo;

    public function __construct(Todo $todo){
        parent::__construct();
        $this->beforeFilter('auth',array('except'=>array('getTodos')));
        $this->todo  = $todo;

    }


    public function index(){
        $this->layout->title ="Todo";
        $todos = $this->todo->paginate();
        $this->layout->content = View::make('Todos.index',compact('todos'));
    }




    public function create(){
        $this->layout->title="Add New Todo";
        $this->layout->content = View::make('Todos.create');
    }



    
    public function store(){
        if(!$this->todo->fill(Input::all())->isValid()){
            Session::flash('message','Validation error occured');
            return Redirect::back()->withInput()->withErrors($this->todo->errors);
        }else{
            $this->todo->save();
            Session::flash('message','Todo saved');
            return Redirect::to('todos');
        }
    }



    public function getTodos(){
        $todos =$this->user->all();
        return Response::JSON($todos);
    }
}