<?php

class BugStatus extends \Eloquent {


    protected $table ='bug_statuses';
	// Add your validation rules here

    public  $errors;

    // Don't forget to fill this array
	protected $fillable = ['name'];


    public function rules($id){
        return [
            'name'=>'required|min:3|unique:bug_statuses,name,'.$id

        ];
    }


    public function isValid($id=null){
        $validator  = Validator::make($this->attributes,$this->rules($id));
        if($validator->passes()) return true;
        $this->errors = $validator->messages(); return false;
    }




    public static function getBugStatusList(){
        return static ::lists('name','id');
    }



}