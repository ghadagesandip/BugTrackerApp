<?php


Validator::extend('registeredEmail', function($attribute, $value, $parameters)
{
    $user = User::where('email','=',$value)->get();
    if ($user->isEmpty() ){
        return false;
    }else{
        return true;
    }
});