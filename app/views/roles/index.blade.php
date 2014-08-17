@section('content')

<div class="row">
    <div class="col-sm-12">
        <ul class="breadcrumb">
            <li><a href="{{URL::to('/dashboard')}}">Home</a></li>
            <li class="current">Roles</li>
        </ul>
    </div>
 </div>

<div class="row">
    <div class="col-sm-12">
        <h1>Roles <a class="btn btn-success" href="{{URL::to('/roles/create')}}"><i class="glyphicon glyphicon-plus">Add Role</i></a></h1>

        @if(Session::has('message'))
        <div class="alert alert-info">{{Session::get('message')}}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th>Id</th>
                    <th>Role</th>
                    <th>Created</th>
                    <th>Modified</th>
                    <th>Option</th>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->created_at}}</td>
                        <td>{{$role->updated_at}}</td>
                        <td>
                            <a class="btn btn-info small" href="{{URL::to('/roles/'.$role->id)}}">View </a>
                            <a class="btn  btn-warning" href="{{URL::to('roles/'.$role->id.'/edit')}}">Edit</a>
                            {{Form::open(array('url'=>'roles/'.$role->id,'class'=>'pull-right'))}}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete this user', array('class' => 'btn btn-danger','onClick'=>'return confirm("Are you sure to delete?")')) }}
                            {{Form::close()}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@stop