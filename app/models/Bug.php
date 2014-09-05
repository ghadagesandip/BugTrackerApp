<?php

class Bug extends \Eloquent {

    protected $guarded = array('id','assigned_by');

    public function bugStatus(){
        return $this->belongsTo('BugStatus');
    }


    public $errors = null;


    protected function rules($id){
        return [
            'title'=>'required|unique:bugs,title,'.$id,
            'bug_type_id'=>'required',
            'bug_status_id'=>'required',
            'assigned_to'=>'required',
        ];
    }


    public function isValid($id = null){

        $this->attributes['expected_close_date'] = date('y-m-d',strtotime($this->attributes['expected_close_date']));

        $validate = Validator::make($this->attributes,$this->rules($id));
        if($validate->passes()) return true;

        $this->errors = $validate->messages();
        return false;
    }



    public function bugType(){
        return $this->belongsTo('BugType');
    }



    public function project(){
        return $this->belongsTo('Project');
    }



    public function assignedTo(){
        return $this->belongsTo('User','assigned_to');
    }



    public function assignedBy(){
        return $this->belongsTo('User','assignedBy');
    }


}