
@section('content')

<?php
$selectedUsers = array();
foreach($project->users as $idx=>$user){

    $selectedUsers[$idx] =$user->id;
 } ?>


<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="{{URL::to('/dashboard')}}">Home</a></li>
            <li><a href="{{URL::to('/projects')}}">Projects</a></li>
            <li class="active">Edit Project Details</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-12">

        {{ Form::model($project, array('class'=>'form-horizontal','route'=>array('projects.update',$project->id),'method'=>'PUT')) }}
        <div class="form-group">
            {{ Form::label('name','Project Name' , array('class'=>'col-sm-2 control-label')) }}
            <div class="col-sm-4 @if($errors->has('name')) has-error has-feedback @endif" >
                {{ Form::text('name', $project->name ,array('class'=>'form-control')) }}
                {{$errors->first('name','<p class="text-danger">:message</p>')}}
                @if ($errors->first('name')) <span class="glyphicon glyphicon-remove form-control-feedback"></span> @endif
            </div>
        </div>

        <div class="form-group">
            {{Form::label('is_active','Project Active',array('class'=>'col-sm-2 control-label'))}}
            <div class="col-sm-4 @if($errors->has('is_active')) has-error has-feedback @endif">
                {{Form::checkbox('is_active',1,$project->is_active,array('class'=>'form-control')) }}
                {{$errors->first('is_active','<p class="text-danger">:message</p>')}}
            </div>
        </div>

        <div class="form-group">
            {{Form::label('user_id','User',array('class'=>'col-sm-2 control-label'))}}
            <div class="col-sm-4">
                {{Form::select('user_id[]',$users,$selectedUsers,array('class'=>'form-control','multiple'=>true))}}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-4 control-label">
                {{ Form::submit('Update Project ',array('class'=>'btn btn-primary'))}}
                <a class="btn btn-info" href="{{URL::to('/projects')}}">Cancel</a>
            </div>
        </div>

        {{Form::close() }}
    </div>
</div>

@stop
