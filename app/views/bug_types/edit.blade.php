@section('content')
<div class="row">
    <div class="col-sm-12">
        <ul class="breadcrumb">
            <li><a href="{{URL::to('dashboard')}}">Home</a></li>
            <li><a href="{{URL::to('bug-types')}}">Bug Types</a></li>
            <li>Edit Bug Type</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <h1>Update Bug Type</h1>

        @if(Session::has('message'))
        <div class="alert alert-danger">{{Session::get('message')}}</div>
        @endif

        {{Form::model($bugtype,array('route'=>array('bug-types.update',$bugtype->id),'class'=>'form-horizontal','method'=>'PUT'))}}

            <div class="form-group">
                {{Form::label('name','Bug Type',array('class'=>'col-sm-2 control-label'))}}
                <div class="col-md-4 @if($errors->has('name')) has-feedback has-error @endif">
                    {{Form::text('name',Input::old('name'),array('class'=>'form-control'))}}
                    {{$errors->first('name','<p class="text-danger">:message</p>')}}
                    @if($errors->has('name'))<span class="glyphicon glyphicon-remove form-control-feedback"></span> @endif
                </div>
            </div>



            <div class="form-group">
                <div class="col-sm-4 control-label">
                    {{Form::submit('Update',array('class'=>'btn btn-success'))}}
                    <a class="btn btn-default" href="{{URL::to('bug-types')}}">Cancel</a>
                </div>
            </div>
        {{Form::close()}}
    </div>
</div>
@stop