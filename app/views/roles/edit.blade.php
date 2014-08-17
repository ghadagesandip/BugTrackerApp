@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ul class="breadcrumb">
                <li><a href="{{URL::to('dashboard')}}">Home</a></li>
                <li><a href="{{URL::to('roles')}}">Role</a></li>
                <li class="current">Update Role</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            {{Form::model($role,array('route'=>array('roles.update',$role->id),'class'=>'form-horizontal','method'=>'PUT'))}}
                <div class="form-group">
                    {{Form::label('name','Role Name',array('class'=>'col-sm-2 control-label'))}}
                    <div class="col-sm-4 @if($errors->has('name')) has-error has-feedback @endif">
                        {{Form::text('name',Input::old('name'),array('class'=>'form-control'))}}
                        {{$errors->first('name','<p class="text-danger">:message</p>')}}
                        @if($errors->has('name')) <span class="glyphicon glyphicon-remove form-control-feedback"></span>@endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4 control-label">
                        {{Form::submit('Submit',array('class'=>'btn btn-success'))}}
                        <a class="btn" href="{{URL::to('roles')}}">Cancel</a>
                    </div>
                </div>
            {{Form::close()}}
        </div>
    </div>
@stop