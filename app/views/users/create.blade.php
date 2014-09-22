@section('content')

    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li><a href="{{URL::to('home')}}">Home</a></li>
                <li><a href="{{URL::to('users')}}">Users</a></li>
                <li>Add user details</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h1 class="col-md-offset-2 "><i class="glyphicon glyphicon-user"></i> Add User</h1>
            @if(Session::has('message'))
            <div class="alert alert-danger">{{Session::get('message')}}</div>
            @endif

            {{Form::open(array('url'=>'users','class'=>'form-horizontal')) }}

                <div class="form-group">
                    {{Form::label('role_id','Role',array('class'=>'col-sm-2 control-label'))}}
                    <div class="col-sm-4 @if($errors->has('role_id')) has-error has-feedback @endif">
                        {{Form::select('role_id',$roles,Input::old('role_id'),array('class'=>'form-control')) }}
                        {{$errors->first('role_id','<p class="text-danger">:message</p>')}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('first_name','First Name',array('class'=>'col-sm-2 control-label'))}}
                    <div class="col-md-4 @if($errors->has('first_name')) has-error has-feedback @endif">
                        {{Form::text('first_name',Input::old('first_name'),array('class'=>'form-control'))}}
                        {{$errors->first('first_name','<p class="text-danger">:message</p>')}}
                        @if($errors->has('first_name'))<span class="glyphicon glyphicon-remove form-control-feedback"></span> @endif
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('last_name','Last Name',array('class'=>'col-sm-2 control-label'))}}
                    <div class="col-md-4 @if($errors->has('last_name')) has-error has-feedback @endif">
                        {{Form::text('last_name',Input::old('last_name'),array('class'=>'form-control'))}}
                        {{$errors->first('last_name','<p class="text-danger">:message</p>')}}
                        @if($errors->has('last_name'))<span class="glyphicon glyphicon-remove form-control-feedback"></span> @endif
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('username','Username',array('class'=>'col-sm-2 control-label'))}}
                    <div class="col-md-4 @if($errors->has('username')) has-error has-feedback @endif">
                        {{Form::text('username',Input::old('username'),array('class'=>'form-control'))}}
                        {{$errors->first('username','<p class="text-danger">:message</p>')}}
                        @if($errors->has('username'))<span class="glyphicon glyphicon-remove form-control-feedback"></span>@endif
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('password','Password',array('class'=>'col-sm-2 control-label'))}}
                    <div class="col-md-4 @if($errors->has('password')) has-error has-feedback @endif">
                        {{Form::password('password',array('class'=>'form-control'))}}
                        {{$errors->first('password','<p class="text-danger">:message</p>')}}
                        @if($errors->has('password'))<span class="glyphicon glyphicon-remove form-control-feedback"></span>@endif
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('password_confirmation','Confirm password',array('class'=>'col-sm-2 control-label'))}}
                    <div class="col-md-4 @if($errors->has('password_confirmation')) has-error has-feedback @endif">
                        {{Form::password('password_confirmation',array('class'=>'form-control'))}}
                        {{$errors->first('password_confirmation','<p class="text-danger">:message</p>')}}
                        @if($errors->has('password_confirmation'))<span class="glyphicon glyphicon-remove form-control-feedback"></span> @endif
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('email','Email',array('class'=>'col-sm-2 control-label'))}}
                    <div class="col-md-4 @if($errors->has('email')) has-error has-feedback @endif">
                        {{Form::email('email',Input::old('email'),array('class'=>'form-control'))}}
                        {{$errors->first('email','<p class="text-danger">:message</p>')}}
                        @if($errors->has('email')) <span class="glyphicon glyphicon-remove form-control-feedback"></span>@endif
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('gender','Gender', array('class'=>'col-sm-2 control-label')) }}
                    <div class="col-sm-4 @if($errors->has('gender')) has-error has-feedback @endif" >
                        {{ Form::radio('gender','male',true) }}Male
                        {{ Form::radio('gender','female') }}Female
                        {{$errors->first('gender','<p class="text-danger">:message</p>')}}
                        @if ($errors->first('gender')) <span class="glyphicon glyphicon-remove form-control-feedback"></span> @endif
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-4 control-label">
                        {{Form::submit('Submit',array('class'=>'btn btn-primary'))}}
                        <a class="btn" href="{{URL::to('users')}}">Cancel</a>
                    </div>
                </div>

            {{Form::close()}}
        </div>
    </div>
@stop