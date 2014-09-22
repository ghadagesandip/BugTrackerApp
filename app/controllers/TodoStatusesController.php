<?php

class TodoStatusesController extends \BaseController{

    public $layout = 'layouts.default';

    protected $todoStatus ;


    public function __construct(TodoStatus $todoStatus){
        $this->todoStatus = $todoStatus;
    }


    public function index(){
        $this->layout->title ="Todo Statuses";
        $todoStatuses = $this->todoStatus->paginate();
        $this->layout->content = View::make('TodoStatus.index',compact('todoStatuses'));
    }


    public function create(){
        $this->layout->title ="Add new Todo";
        $this->layout->content = View::make('TodoStatus.create');
    }


    public function store(){
        if(!$this->todoStatus->fill(Input::all())->isValid()){
           Session::flash('message','Validation error occured');
           return Redirect::back()->withInput()->withErrors($this->todoStatus->errors);
        }else{
            Session::flash('message','Todo Status added successfully');
            return Redirect::to('todo-statuses');
        }
    }

}