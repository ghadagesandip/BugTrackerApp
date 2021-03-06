@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ul class="breadcrumb">
                <li><a href="{{URL::to('/dashboard')}}">Home</a></li>
                <li><a href="{{URL::to('/todos')}}">Todo</a></li>
                <li>Uodate Todo</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <h1 class="col-md-offset-2"> <i class="glyphicon glyphicon-pencil"></i> Update todo </h1>
            @if(Session::has('message'))
            <div class="alert alert-danger">{{Session::get('message')}}</div>
            @endif

            {{Form::model($todo,array('route'=>array('todos.update',$todo->id),'class'=>'form-horizontal','method'=>'PUT'))}}
                <div class="form-group">
                    {{Form::label('project_id','Project',array('class'=>'col-sm-2 control-label'))}}
                    <div class="col-sm-4">
                        {{Form::select('project_id',$projects,$todo->project_id,array('class'=>'col-sm-4 form-control'))}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('title','Title',array('class'=>'col-sm-2 control-label'))}}
                    <div class="col-sm-4 @if($errors->has('title')) has-feedback has-error @endif">
                        {{Form::text('title','Title',array('class'=>'col-sm-4 form-control'))}}
                        {{$errors->first('title','<p class="text text-danger">:message</p>')}}
                        @if($errors->has('title'))<span class="glyphicon glyphicon-remove form-control-feedback"></span> @endif
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('description','Description',array('class'=>'col-sm-2 control-label'))}}
                    <div class="col-sm-4">
                        {{Form::textarea('description')}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('todo_status','Completed',array('class'=>'col-sm-2 control-label'))}}
                    <div class="col-sm-4">
                        {{Form::checkbox('todo_status',1,Input::old('todo_status'),array('class'=>'col-sm-4 form-control'))}}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4 control-label">
                        {{Form::submit('Update',array('class'=>'btn btn-success'))}}
                        <a href="{{URL::to('/todos')}}" class="btn">Cancel</a>
                    </div>
                </div>
            {{Form::close()}}
        </div>
    </div>


@stop