@extends('layouts.login')
@section('content')

<div class="row-fluid">
    {{Form::open(array('url'=>'authenticate','class'=>'form-horizontal'))}}
        @if(Session::has('message'))
        <div class="alert alert-danger">{{Session::get('message')}}</div>
        @endif

        @if(Session::has('success-message'))
        <div class="alert alert-success">{{Session::get('success-message')}}</div>
        @endif

        <h2 class="form-signin-heading col-sm-offset-1">Please sign in</h2>

        <div class="form-group">
            {{Form::label('username','Username',array('class'=>'control-label col-sm-2'))}}
            <div class="col-sm-4">
                {{Form::text('username',Input::old('username'),array('class'=>'form-control'))}}
            </div>
        </div>

        <div class="form-group">
            {{Form::label('password','Password',array('class'=>'control-label col-sm-2'))}}
            <div class="col-sm-4">
                {{Form::password('password',array('class'=>'form-control'))}}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3 control-label">
                {{Form::submit('Login',array('class'=>'btn btn-primary'))}}
                <a class="btn" href="{{URL::to('forgot-password')}}">forgot password</a>
            </div>
        </div>

    {{Form::close()}}
<div>
@stop