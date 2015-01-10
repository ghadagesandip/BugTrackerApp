<?php

class TodoPriority extends \Eloquent {

	protected $fillable = ['name'];

    public function getTodoPriorities(){
        return $this->lists('name','id');
    }

    public static function getPriorities(){
        return static :: select('name','id')->get();
    }
}