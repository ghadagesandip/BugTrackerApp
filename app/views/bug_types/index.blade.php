@section('content')
<div class="row">
    <div class="col-md-12">
        <ul  class="breadcrumb">
            <li><a href="{{URL::to('dashboard')}}">Home</a></li>
            <li class="current">Bug Types</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <h1>Bug Types <a class="btn btn-success" href="{{URL::to('/bug-types/create')}}"><i class="glyphicon glyphicon-plus">Add Bug Type</i></a></h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th>Id</th>
                    <th>Bug Type</th>
                    <th>Created On</th>
                    <th>Updated On</th>
                    <th>Option</th>
                </thead>
                <tbody>
                   @foreach($bugtypes as $bugtype)
                        <tr>
                            <td>{{$bugtype->id}}</td>
                            <td>{{$bugtype->name}}</td>
                            <td>{{$bugtype->created_on}}</td>
                            <td>{{$bugtype->created_at}}</td>
                            <td>
                                <a class="btn btn-info" href="{{URL::to('/bug-types/'.$bugtype->id)}}">View</a>
                            </td>
                        </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop