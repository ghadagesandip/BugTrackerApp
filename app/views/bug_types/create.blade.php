@section('content')
 <div class="row">
     <div class="col-sm-12">
         <ul class="breadcrumb">
             <li><a href="{{URL::to('dashboard')}}">Home</a></li>
             <li><a href="{{URL::to('bug-types')}}">Bug Types</a></li>
             <li>Add new Bug Type</li>
         </ul>
     </div>
 </div>

<div class="row">
    <div class="col-sm-12">
        @if(Session::has('message'))
        <div class="alert alert-danger">{{Session::get('message')}}</div>
        @endif

        {{Form::open(array('route'=>array('bug-types.store'),'class'=>'form-horizontal'))}}
            <div class="form-group">
                {{Form::label('bug-types','Bug Type',array('class'=>'col-sm-2 control-label'))}}
                <div class="col-sm-4 @if($errors->has('name')) has-error has-feedback @endif">
                    {{Form::text('name',Input::old('name'),array('class'=>'form-control'))}}
                    {{$errors->first('name','<p class="text-danger">:message</p>')}}
                    @if($errors->has('name')) <span class="glyphicon glyphicon-remove form-control-feedback"></span>@endif
                </div>

            </div>

            <div class="form-group">
                <div class="col-sm-4 control-label">
                    {{Form::submit('Add',array('class'=>'btn btn-success'))}}
                    <a class="btn btn-default" href="{{URL::route('bug-types.index')}}">Cancel</a>
                </div>
            </div>
        {{Form::close()}}
    </div>
</div>
@stop