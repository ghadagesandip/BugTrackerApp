<?php

class Role extends \Eloquent {


	// Don't forget to fill this array
	protected $fillable = ['name'];

    public $errors;

    protected  function rules($id){
        return [
            'name'=>'required|min:3|unique:roles,name,'.$id
       ];
    }


    public function isValid($id=null){
        $validator = Validator::make($this->attributes,$this->rules($id));
        if($validator->passes()) return true;

        $this->errors = $validator->messages();
        return false;

    }

    public function users(){
     return $this->hasMany('User');
    }


    public static function getRoleList(){
        return static::lists('name','id');
    }

}