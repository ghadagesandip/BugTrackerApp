@section('content')
 <div class="row">
     <div class="col-sm-12">
         <ul class="breadcrumb">
             <li><a href="{{URL::to('/dashboard')}}">Home</a></li>
             <li><a href="{{URL::to('/todo-statuses')}}">Todo Statuses</a></li>
             <li>Create Todo Status</li>
         </ul>
     </div>
 </div>

 <div class="row">
     <div class="col-sm-12">
         <h2 class="col-sm-offset-2"><i class="glyphicon glyphicon-plus"></i>Add Todo Status</h2>
         @if(Session::has('message'))
         <div class="alert alert-error">{{Session::get('message')}}</div>
         @endif

         {{Form::open(array('url'=>'todo-statuses','class'=>'form-horizontal'))}}
            <div class="form-group">
                {{Form::label('name','Todo Status',array('class'=>'col-sm-2 control-label'))}}
                <div class="col-sm-4 @if($errors->has('name')) has-error has-feedback @endif">
                    {{Form::text('name',Input::old('name'),array('class'=>'col-sm-4 form-control'))}}
                    {{$errors->first('name','<p class="text-danger"> :message</p>')}}
                    @if($errors->has('name'))<span class="glyphicon glyphicon-remove form-control-feedback"></span> @endif
                </div>
            </div>

            <div class="row">
                <div class="col-sm-offset-2">
                    {{Form::submit('Submit',array('class'=>'btn btn-success'))}}
                    <a class="btn btn-default" href="{{URL::to('todo-statuses')}}">Back</a>
                </div>
            </div>
         {{Form::close()}}
     </div>
 </div>
@stop