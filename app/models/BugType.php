<?php

class BugType extends \Eloquent {


	// Don't forget to fill this array
	protected $fillable = ['name'];


    public $errors;


    public function rules($id){
        return [
            'name'=>'required|unique:bug_types,name,'.$id
        ];
    }



    public function isValid($id=null){
        $validator = Validator::make($this->attributes,$this->rules($id));
        if($validator->passes()){
            return true;
        }else{
            $this->errors = $validator->messages();
            return false;
        }
    }


    public static function getBugTypeList(){
        return static::lists('name','id');
    }


    public function scopeGetBugTypeList($query){
        return $query->lists('id','name');
    }


}