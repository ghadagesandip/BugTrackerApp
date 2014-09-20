@section('content')
<div class="row">
    <div class="col-sm-12">
        <ul class="breadcrumb">
            <li><a href="{{URL::to('/dashboard')}}">Home</a></li>
            <li><a href="{{URL::to('/roles')}}">Role</a></li>
            <li class="current">Add Role</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <h1 class="col-md-offset-2 col-lg-offset-4"><i class="glyphicon glyphicon-user"></i> Add Role</h1>
        @if(Session::has('message'))
        <div class="alert alert-danger">{{Session::get('message')}}</div>
        @endif

        {{Form::open(array('url'=>'roles','class'=>'form-horizontal'))}}
            <div class="form-group">
                {{Form::label('name','Role',array('class'=>'col-sm-2 control-label'))}}
                <div class="col-md-4 @if($errors->has('name')) has-feedback has-error @endif">
                    {{Form::text('name',Input::old('name'),array('class'=>'form-control'))}}
                    {{$errors->first('name','<p class="text-danger">:message</p>')}}
                    @if($errors->has('name'))<span class="glyphicon glyphicon-remove form-control-feedback"></span> @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4 control-label">
                    {{Form::submit('Submit',array('class'=>'btn btn-primary'))}}
                    <a class="btn" href="{{URL::to('roles')}}">Back</a>
                </div>
            </div>
        {{Form::close()}}
    </div>
</div>

@stop
