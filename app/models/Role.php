<?php

class Role extends \Eloquent {


	// Don't forget to fill this array
	protected $fillable = ['name'];

    public $errors;

    public static $rules = [
        'name'=>'required'
    ];


    public function isValid(){
        $validator = Validator::make($this->attributes,static::$rules);
        if($validator->passes()); return true;

        $this->errors = $validator->messages();
        return false;

    }

    public function users(){
        $this->hasMany('User');
    }


    public static function getRoleList(){
        return static::lists('name','id');
    }

}