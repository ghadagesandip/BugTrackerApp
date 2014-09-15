<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

    protected $fillable = array('role_id','first_name','last_name','user_email','username','password','password_confirmation','email','gender');

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


    protected $messages = array(
        'user_email.required'=>'Please enter email address, to send password recovery email',
        'user_email.registeredEmail'=>'No user registered with this email address'
    );


    protected function rules($id=null){
        return [
            'role_id'=>'sometimes|required',
            'first_name'=>'sometimes|required|alpha',
            'last_name'=>'sometimes|required|alpha',
            'username'=>'sometimes|required|alpha_dash|unique:users',
            'password'=>'sometimes|required|between:6,18|confirmed',
            'password_confirmation'=>'sometimes|required',
            'email'=>'sometimes|required|unique:users,email,'.$id,
            'user_email'=>'sometimes|required|email|registeredEmail'
        ];
    }



    public function isValid($id=null){

        $validation = Validator::make($this->attributes,$this->rules($id),$this->messages);
        if($validation->passes()) return true;

        $this->errors = $validation->messages();
        return false;

    }


    public function role(){
        return $this->belongsTo('Role');
    }


    public function scopeGetProgrammerDesigner($query){
        return $query->where('role_id','>','0');
    }

    public function scopeGetList($query){
        return $query->lists('first_name','id');
    }

}
