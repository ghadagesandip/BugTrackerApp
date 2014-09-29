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


    public function scopeActive($query){
        return $query->whereIsActive(1);
    }


    public function scopeGetProjectList($query){
        return $query->lists('name','id');
    }


    public function scopeByUser($query,$userId){
        return $query->whereUserId($userId);
    }


}