<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

    protected $fillable = array('role_id','first_name','last_name','username','password','password_confirmation','email','gender');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


    public $errors;


    protected function rules($id=null){
        return [
            'role_id'=>'required',
            'first_name'=>'required|alpha',
            'last_name'=>'required|alpha',
            'username'=>'sometimes|required|alpha_dash|unique:users',
            'password'=>'sometimes|required|between:6,18|confirmed',
            'password_confirmation'=>'sometimes|required',
            'email'=>'required|unique:users,email,'.$id
        ];
    }



    public function isValid($id=null){
        $validation = Validator::make($this->attributes,$this->rules($id));
        if($validation->passes()) return true;

        $this->errors = $validation->messages();
        return false;

    }


    public function role(){
        return $this->belongsTo('Role');
    }


}
