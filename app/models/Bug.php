<?php

class Bug extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];



    public function bugStatus(){
        return $this->belongsTo('BugStatus');
    }


    public function bugType(){
        return $this->belongsTo('Bugtype');
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