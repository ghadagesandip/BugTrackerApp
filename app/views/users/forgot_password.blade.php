@extends('layouts.login')
@section('content')

<div class="row-fluid">
    {{Form::open(array('url'=>'sendEmail','class'=>'form-horizontal'))}}
    @if(Session::has('message'))
    <div class="alert alert-danger">{{Session::get('message')}}</div>
    @endif

    @if(Session::has('success-message'))
    <div class="alert alert-success">{{Session::get('success-message')}}</div>
    @endif

    <h2 class="form-signin-heading col-sm-offset-1">Enter email address</h2>

    <div class="form-group">
        {{Form::label('user_email','Email',array('class'=>'control-label col-sm-2'))}}
        <div class="col-sm-4 @if($errors->has('user_email')) has-feedback has-error @endif">
            {{Form::text('user_email',Input::old('user_email'),array('class'=>'form-control'))}}
            {{$errors->first('user_email','<p class="text-danger">:message</p>')}}
            @if($errors->has('user_email')) <span class="glyphicon glyphicon-remove form-control-feedback"> </span>@endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-4 control-label">
            {{Form::submit('Send Email',array('class'=>'btn btn-primary'))}}
            <a class="btn" href="{{URL::to('login')}}">Back to Login</a>
        </div>
    </div>

    {{Form::close()}}
    <div>
@stop