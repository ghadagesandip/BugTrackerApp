@extends('layouts.login')

@section('content')

    <div class="row-fluid">
        <div class="col-md-12">
            @if(Session::has('message'))
            <div class="alert alert-danger">{{Session::get('message')}}</div>
            @endif

            <h2 class="form-signin-heading">Register</h2>

            {{Form::open(array('url'=>'/register','class'=>'form-horizontal'))}}
                <div class="form-group">
                    {{Form::label('role_id','Role',array('class'=>'col-sm-2 control-label'))}}
                    <div class="col-sm-4 @if($errors->has('role_id')) has-error has-feedback @endif">
                        {{Form::select('role_id',$roles,Input::old('role_id'),array('class'=>'form-control')) }}
                        {{$errors->first('role_id','<p class="text-danger">:message</p>')}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('first_name','First Name')}}
                </div>

            {{Form::close()}}
        </div>

    </div>

@stop