@extends('layouts.login')
@section('content')

<div class="row-fluid">
    {{Form::open(array('url'=>'authenticate','class'=>'form-signin'))}}
        @if(Session::has('message'))
        <div class="alert alert-danger">{{Session::get('message')}}</div>
        @endif

        @if(Session::has('success-message'))
        <div class="alert alert-success">{{Session::get('success-message')}}</div>
        @endif

        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="username" autofocus="" name="username" required="" placeholder="Email address or username" class="form-control">
        <input type="password" required="" name="password" placeholder="Password" class="form-control">
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
    {{Form::close()}}
<div>
@stop