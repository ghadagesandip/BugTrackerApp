<?php

Event::listen('auth.login', function($user)
{

$user->last_login = new DateTime;
$user->save();

});


Event::listen('auth.saveNewUser', function($user)
{

    unset($user->password_confirmation);
    $user->password = Hash::make($user->password);
    $user->save();

});