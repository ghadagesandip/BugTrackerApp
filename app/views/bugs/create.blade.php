@section('content')
<div class="row">
    <div class="col-sm-12">
        <ul class="breadcrumb">
            <li><a href="{{URL::to('dashboard')}}">Home</a></li>
            <li><a href="{{URL::to('bugs')}}">Bugs</a></li>
            <li>Add new Bug</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        @if(Session::has('message'))
        <div class="alert alert-danger">{{Session::get('message')}}</div>
        @endif

        {{Form::open(array('route'=>array('bugs.store'),'class'=>'form-horizontal'))}}
            <div class="form-group">
                {{Form::label('title','Title',array('class'=>'col-sm-2 control-label'))}}
                <div class="col-sm-4 @if($errors->has('title')) has-error has-feedback @endif">
                    {{Form::text('title',Input::old('title'),array('class'=>'form-control'))}}
                    {{$errors->first('title','<p class="text-danger">:message</p>')}}
                    @if($errors->has('title')) <span class="glyphicon glyphicon-remove form-control-feedback"></span>@endif
                </div>

            </div>

            <div class="form-group">
                {{Form::label('description','Description',array('class'=>'col-sm-2 control-label'))}}
                <div class="col-sm-4 @if($errors->has('description')) has-error has-feedback @endif">
                    {{Form::textarea('description',Input::old('description'),array('class'=>'form-control'))}}
                    {{$errors->first('description','<p class="text-danger">:message</p>')}}
                    @if($errors->has('description')) <span class="glyphicon glyphicon-remove form-control-feedback"></span>@endif                </div>
            </div>

            <div class="form-group">
                {{Form::label('bug_type_id','Bug Type',array('class'=>'col-sm-2 control-label'))}}
                <div class="col-sm-4 @if($errors->has('bug_type_id')) has-error has-feedback @endif">
                    {{Form::select('bug_type_id',$bugTypes,input::old('bug_type_id'),array('class'=>'form-control'))}}
                    {{$errors->first('bug_type_id','<p class="text-danger">:message</p>')}}
                    @if($errors->has('bug_type_id'))<span class="glyphicon glyphicon-remove form-control-feedback"> </span>@endif
                </div>
            </div>

            <div class="form-group">
                {{Form::label('bug_status_id','Bug Status',array('class'=>'col-sm-2 control-label'))}}
                <div class="col-sm-4 @if($errors->has('bug_status_id')) has-error has-feedback @endif">
                    {{Form::select('bug_status_id',$bugStatuses,input::old('bug_status_id'),array('class'=>'form-control'))}}
                    {{$errors->first('bug_status_id','<p class="text-danger">:message</p>')}}
                    @if($errors->has('bug_status_id'))<span class="glyphicon glyphicon-remove form-control-feedback"> </span>@endif
                </div>
            </div>

            <div class="form-group">
                {{Form::label('assigned_to','Assign To',array('class'=>'col-sm-2 control-label'))}}
                <div class="col-sm-4 @if($errors->has('assigned_to')) has-error has-feedback @endif">
                    {{Form::select('assigned_to',$assignTo,input::old('assigned_to'),array('class'=>'form-control'))}}
                    {{$errors->first('assigned_to','<p class="text-danger">:message</p>')}}
                    @if($errors->has('assigned_to'))<span class="glyphicon glyphicon-remove form-control-feedback"> </span>@endif
                </div>
            </div>

            <div class="form-group">
                {{Form::label('expected_close_date','Expected close date',array('class'=>'col-sm-2 control-label'))}}
                <div class="col-sm-4 @if($errors->has('bug_status_id')) has-error has-feedback @endif">
                    {{Form::text('expected_close_date',input::old('expected_close_date'),array('class'=>'form-control','id'=>'datepicker'))}}
                    {{$errors->first('expected_close_date','<p class="text-danger">:message</p>')}}
                    @if($errors->has('expected_close_date'))<span class="glyphicon glyphicon-remove form-control-feedback"> </span>@endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-4 control-label">
                    {{Form::submit('Add',array('class'=>'btn btn-success'))}}
                    <a class="btn btn-default" href="{{URL::route('bugs.index')}}">Cancel</a>
                </div>
            </div>


        {{Form::close()}}
    </div>
</div>


@stop