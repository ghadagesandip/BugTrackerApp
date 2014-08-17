@section('content')
<div class="row">
    <div class="col-sm-12">
        <ul class="breadcrumb">
            <li><a href="{{URL::to('dashboard')}}">Home</a></li>
            <li><a href="{{URL::to('roles')}}">Role</a></li>
            <li class="current">Add role</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <dl class="dl-horizontal">
            <dt>Id</dt>
            <dd>{{$role->id}}</dd>

            <dt>Role</dt>
            <dd>{{$role->name}}</dd>

            <dt>Created on</dt>
            <dd>{{$role->created_at}}</dd>

            <dt>Updated On</dt>
            <dd>{{$role->updated_at}}</dd>
        </dl>

        <div class="row">
            <div class="col-sm-offset-1">
                <a class="btn" href="{{URL::to('roles')}}">Back</a>
            </div>
        </div>
    </div>
</div>
@stop