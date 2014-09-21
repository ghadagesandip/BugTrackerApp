<?php
class Todo extends \Eloquent{

    public $fillable = ['title','description','project_id'];

    public $errors;

    public function rules($id){
        return [
            'title'=>'required|min:3|unique:todos,title,'.$id
        ];
    }


    public function isValid($id=null){
        $validator = Validator::make($this->attributes,$this->rules($id));
        if($validator->passes()) return true;

        $this->errors = $validator->messages();
        return false;
    }


    public function user(){
        return $this->belongsTo('User');
    }


    public function project(){
        return $this->belongsTo('Project');
    }

}