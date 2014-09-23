@section('content')

    <div class="row">
        <div class="col-sm-12">
            <ul class="breadcrumb">
                <li><a href="{{URL::to('/dashboard')}}">Home</a></li>
                <li>My Todos</li>
            </ul>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-12">
            <h1>Todos <a class="btn btn-success" href="{{URL::to('/todos/create')}}">Add New</a></h1>
            @if(Session::has('message'))
              <div class="alert alert-info">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  {{Session::get('message')}}
              </div>
            @endif
        </div>

        <table class="table-responsive">
            <table class="table table-hover table-responsive table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Project</th>
                    <th>Title</th>
                    <th class="col-sm-7">Description</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($todos as $todo)
                <tr>
                    <td>{{$todo->id}}</td>
                    <td>{{$todo->project->name}}</td>
                    <td>{{$todo->title}}</td>
                    <td>{{$todo->description}}</td>
                    <td>
                        <a class="btn btn-info small" href="{{URL::to('/todos/'.$todo->id)}}">View</a>
                        <a class="btn btn-warning" href="{{URL::to('todos/'.$todo->id.'/edit')}}">Edit</a>
                        {{Form::open(array('url'=>'todos/'.$todo->id,'class'=>'pull-right'))}}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Delete', array('class' => 'btn btn-danger','onClick'=>'return confirm("Are you sure to delete?")')) }}
                        {{Form::close()}}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </table>

    </div>
@stop