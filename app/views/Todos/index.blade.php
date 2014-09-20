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
              <div class="alert alert-info"> </div> {{Session::get('message')}}
            @endif
        </div>

        <table class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($todos as $todo)
                <tr>
                    <td>{{$todo->id}}</td>
                    <td>{{$todo->title}}</td>
                    <td>

                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </table>

    </div>
@stop