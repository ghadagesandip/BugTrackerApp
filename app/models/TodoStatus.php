<?php

class TodoStatus extends \Eloquent{

    protected $fillable = ['name'];


    public $errors;


    protected  function rules($id){
        return [
            'name'=>'required|unique:todo_statuses,name,'.$id
        ];
    }

    protected $message = [
        'name.required' =>'Please enter todo status'
    ];


    public function isValid($id = null){
        $validator = Validator::make($this->attributes,$this->rules($id),$this->message);
        if($validator->passes()) return true;

        $this->errors = $validator->messages();
        return false;

    }

}