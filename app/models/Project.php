<?php

class Project extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		 'name' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['name'];

    public $errors;


    public function isValid(){

        $validation = Validator::make($this->attributes,static :: $rules);
        if($validation->passes()) return true;

        $this->errors = $validation->messages();
        return false;
    }


    public function user(){
       return $this->belongsTo('User','created_by');
    }
}