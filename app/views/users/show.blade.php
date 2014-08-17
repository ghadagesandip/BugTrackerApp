@section('content')
<div class="row">
    <div class="col-sm-12">
        <dl class="dl-horizontal">
            <dt>Id : </dt>
            <dd>{{$user->id}}</dd>

            <dt>Role : </dt>
            <dd>{{$user->role->name}}</dd>

            <dt>First Name : </dt>
            <dd>{{$user->first_name}}</dd>

            <dt>Last Name : </dt>
            <dd>{{$user->last_name}}</dd>

            <dt>Username : </dt>
            <dd>{{$user->username}}</dd>

            <dt>Email : </dt>
            <dd>{{$user->email}}</dd>

            <dt>Gender : </dt>
            <dd>{{$user->gender}}</dd>

            <dt>Created : </dt>
            <dd>{{$user->created_at}}</dd>

            <dt>Modified : </dt>
            <dd>{{$user->updated_at}}</dd>
        </dl>
        <div class="row">
            <div class="col-sm-offset-1">
                <a href="{{URL::to('/users')}}" class="btn btn-default" >Cancel</a>
            </div>
        </div>

    </div>
</div>
@stop