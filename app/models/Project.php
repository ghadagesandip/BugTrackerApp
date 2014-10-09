<?php

class Project extends \Eloquent {

	// Add your validation rules here
	protected function  rules($id){
          return [
              'name' => 'required|unique:projects,name,'.$id
          ];
    }

	// Don't forget to fill this array
	protected $fillable = ['name','is_active'];

    public $errors;

    public function isValid($id=null){

        $validation = Validator::make($this->attributes,$this->rules($id));
        if($validation->passes()) return true;

        $this->errors = $validation->messages();
        return false;
    }


    public function user(){
       return $this->belongsTo('User','created_by');
    }


    public function users(){
        return $this->belongsToMany('User');
    }


    public function scopeActive($query){
        return $query->whereIsActive(1);
    }

    public function scopebyUser($query,$userid){
        $this->userid = $userid;
        return $query->whereHas('users',function($q){$q->where('user_id','=',$this->userid);});
    }

    public function scopeGetProjectList($query){
        return $query->select('name','id');
    }

    public function scopeGetFields($query){
        $query->whereHas('users',function($q){$q->select('id','first_name');});
    }

}