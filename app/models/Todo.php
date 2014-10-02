<?php
class Todo extends \Eloquent{

    public $fillable = ['title','description','project_id','todo_status','user_id'];

    public $errors;

    //valdiations
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





    //relationships
    public function user(){
        return $this->belongsTo('User');
    }


    public function project(){
        return $this->belongsTo('Project');
    }

    //scope functions
    public function scopeOwner($query,$userId){
        return $query->whereUserId($userId);
    }


    public function scopeWithProject($query){
        return $query->with(array('project'=>function($query){
            $query->select('id','name');
        }));
    }
}