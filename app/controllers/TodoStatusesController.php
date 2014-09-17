<?php

class TodoStatusesController extends BaseController{

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


}