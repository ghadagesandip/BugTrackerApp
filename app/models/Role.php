<?php

class Role extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];


    public function users(){
        $this->hasMany('User');
    }


    public static function getRoleList(){
        return static::lists('name','id');
    }

}