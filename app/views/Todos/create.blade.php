@section('content')
    <div class="row">
        <div class="col-sm-12">
           <ul class="breadcrumb">
               <li><a href="{{URL::to('/dashboard')}}">Home</a></li>
               <li><a href="{{URL::to('/todos')}}">Todos</a></li>
               <li>list Todos</li>
           </ul>
        </div>
    </div>

    <div class="row">
         <div class="col-sm-12">
            <h1 class="col-md-offset-2"><i class="glyphicon glyphicon-plus"></i>Add Todos </h1>
             @if(Session::has('message'))
             <div class="alert alert-danger"> {{Session::get('message')}}</div>
             @endif

             {{Form::open(array('url'=>'todos','class'=>'form-horizontal'))}}

                <div class="form-group">
                    {{Form::label('project_id','Project',array('class'=>'col-sm-2 control-label'))}}
                    <div class="col-sm-4">
                        {{Form::select('project_id', $projects, Input::old('project_id'),array('class'=>'col-sm-4 form-control'))}}
                    </div>
                </div>
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
                    <div class="col-sm-4">
                        {{Form::textarea('description')}}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4 control-label">
                        {{Form::submit('add',array('class'=>'btn btn-success'))}}
                        <a href="{{URL::to('/todos')}}" class="btn">Cancel</a>
                    </div>
                </div>
             {{Form::close()}}
         </div>
    </div>


@stop
