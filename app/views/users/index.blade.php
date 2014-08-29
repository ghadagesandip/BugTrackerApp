
@section('content')

<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="{{URL::to('/dashboard')}}">Home</a></li>
            <li class="active">Users</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12">
        <h1>User <a class="btn btn-success" href="{{ URL::to('users/create') }}"><span class="glyphicon glyphicon-plus"> </span> Add User</a></h1>

        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif


        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Role</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $key => $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{{ $user->first_name}}</td>
                    <td>{{ $user->last_name}}</td>
                    <td>{{ $user->email}}</td>
                    <td>{{ $user->gender}}</td>
                    <td>
                        <a class="btn btn-small btn-info " href="{{ URL::to('users/' . $user->id) }}">view</a>
                        <a class="btn btn-small btn-primary " href="{{ URL::to('users/' . $user->id . '/edit') }}">Edit</a>
                        {{ Form::open(array('url' => 'users/' . $user->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete this user', array('class' => 'btn btn-warning','onClick'=>'return confirm("Are you sure to delete?")')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php echo $users->links(); ?>
    </div>
</div>
@stop