<?php

class TodoGroup extends \Eloquent {

	protected $fillable = ['name'];

    public function getlist(){
        return $this->lists('name', 'id');
    }

    public static function grouplist(){
        return static::select('name', 'id')->get();
    }
}