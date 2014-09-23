@section('content')
<div class="row">
    <div class="col-md-12">
        <ul  class="breadcrumb">
            <li><a href="{{URL::to('dashboard')}}">Home</a></li>
            <li class="current">Bugs</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <h1>Bugs <a class="btn btn-success" href="{{URL::to('/bugs/create')}}"><i class="glyphicon glyphicon-plus"> Add Bug</i></a></h1>

        @if(Session::has('message'))
        <div class="alert alert-success"> {{Session::get('message')}}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Type</th>
                <th>Assignd to</th>
                <th>Assigned From</th>
                <th class="col-sm-2">Option</th>
                </thead>
                <tbody>
                @foreach($bugs as $bug)
                <tr>
                    <td>{{ $bug->id }}</td>
                    <td>{{ $bug->title }}</td>
                    <td>{{ $bug->description }}</td>
                    <td>{{ $bug->bugStatus->name }}</td>
                    <td>{{ $bug->bugType->name }}</td>
                    <td>{{ $bug->assignedTo->username }}</td>
                    <td></td>
                    <td>
                        <a class="btn btn-info" href="{{URL::to('/bugs/'.$bug->id)}}">View</a>
                        <a class="btn btn-primary" href="{{URL::to('bugs/'.$bug->id.'/edit')}}">Edit</a>
                        {{ Form::open(array('url' => 'bugs/' . $bug->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-warning','onClick'=>'return confirm("Are you sure to delete?")')) }}
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
    <div class="col-sm-12">
        {{$bugs->links()}}
    </div>
</div>
@stop