@section('content')

<div class="row">
    <div class="col-sm-12">
        <ul class="breadcrumb">
            <li><a href="{{URL::to('/dashboard')}}">Home</a></li>
            <li class="current">Todo Statuse</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <h1>Todo Status <a class="btn btn-success" href="{{URL::to('/todo-statuses/create')}}"><i class="glyphicon glyphicon-plus">Add Todo Status</i></a></h1>

        @if(Session::has('message'))
        <div class="alert alert-info">{{Session::get('message')}}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <th>Id</th>
                <th>Todo Status</th>
                <th>Created</th>
                <th>Modified</th>
                <th class="col-sm-2">Option</th>
                </thead>
                <tbody>
                @foreach($todoStatuses as $todoStatus)
                <tr>
                    <td>{{$todoStatus->id}}</td>
                    <td>{{$todoStatus->name}}</td>
                    <td>{{$todoStatus->created_at}}</td>
                    <td>{{$todoStatus->updated_at}}</td>
                    <td>
                        <a class="btn btn-info small" href="{{URL::to('/todo-statuses/'.$todoStatus->id)}}">View </a>
                        <a class="btn  btn-warning" href="{{URL::to('/todo-statuses/'.$todoStatus->id.'/edit')}}">Edit</a>
                        {{Form::open(array('url'=>'todo-statuses/'.$todoStatus->id,'class'=>'pull-right'))}}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Delete', array('class' => 'btn btn-danger','onClick'=>'return confirm("Are you sure to delete?")')) }}
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