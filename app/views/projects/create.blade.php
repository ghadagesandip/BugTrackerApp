@section('content')

    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li><a href="{{URL::to('home')}}">Home</a></li>
                <li><a href="{{URL::to('projects')}}">Projects</a></li>
                <li>Add Project</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h1>Projects</h1>
            @if(Session::has('message'))
            <div class="alert alert-info">{{Session::get('message')}}</div>
            @endif

            {{Form::open(array('url'=>'projects','class'=>'form-horizontal')) }}

            <div class="form-group">
                {{Form::label('name','Project Name',array('class'=>'col-sm-2 control-label'))}}
                <div class="col-sm-4 @if($errors->has('name')) has-error has-feedback @endif">
                    {{Form::text('name',Input::old('name'),array('class'=>'form-control')) }}
                    {{$errors->first('name','<p class="text-danger">:message</p>')}}
                    @if ($errors->first('name')) <span class="glyphicon glyphicon-remove form-control-feedback"></span> @endif
                </div>
            </div>

            <div class="form-group">
                {{Form::label('is_active','Project Active',array('class'=>'col-sm-2 control-label'))}}
                <div class="col-sm-4 @if($errors->has('is_active')) has-error has-feedback @endif">
                    {{Form::checkbox('is_active',Input::old('is_active'),array('class'=>'form-control')) }}
                    {{$errors->first('is_active','<p class="text-danger">:message</p>')}}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-4">
                    {{Form::submit('Submit',array('class'=>'btn btn-primary'))}}
                    <a class="btn" href="{{URL::to('projects')}}">Cancel</a>
                </div>
            </div>

            {{Form::close()}}
        </div>
    </div>
@stop