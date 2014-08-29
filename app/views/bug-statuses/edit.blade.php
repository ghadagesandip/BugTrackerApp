@section('content')
<div class="row">
    <div class="col-sm-12">
        <ul class="breadcrumb">
            <li><a href="{{URL::to('dashboard')}}">Home</a></li>
            <li><a href="{{URL::to('bug-status')}}">Bug Status</a></li>
            <li>Update new Bug Status</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        @if(Session::has('message'))
        <div class="alert alert-danger">{{Session::get('message')}}</div>
        @endif

        {{Form::model($bugStatus,array('route'=>array('bug-statuses.update',$bugStatus->id),'class'=>'form-horizontal','method'=>'PUT'))}}
        <div class="form-group">
            {{Form::label('name','Bug Status',array('class'=>'col-sm-2 control-label'))}}
            <div class="col-sm-4 @if($errors->has('name')) has-error has-feedback @endif">
                {{Form::text('name',Input::old('name'),array('class'=>'form-control'))}}
                {{$errors->first('name','<p class="text-danger">:message</p>')}}
                @if($errors->has('name')) <span class="glyphicon glyphicon-remove form-control-feedback"></span>@endif
            </div>
        </div>

        <div class="form-group">
            {{Form::label('description','Description',array('class'=>'col-sm-2 control-label'))}}
            <div class="col-sm-4">
                {{Form::textarea('description',Input::old('name'),array('class'=>'form-control'))}}
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-4 control-label">
                {{Form::submit('Add',array('class'=>'btn btn-success'))}}
                <a class="btn btn-default" href="{{URL::route('bug-statuses.index')}}">Cancel</a>
            </div>
        </div>
        {{Form::close()}}
    </div>
</div>
@stop