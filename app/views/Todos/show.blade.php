@section('content')
<div class="row">
    <div class="col-sm-12">
        <ul class="breadcrumb">
            <li><a href="{{URL::to('/dashboard')}}">Home</a></li>
            <li><a href="{{URL::to('/totos')}}">Todos</a></li>
            <li>View Todo</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <h1 class="col-sm-4"><i class="glyphicon glyphicon-eye-open"></i>View Todo</h1>
        <dl class="dl-horizontal">
            <dt>Id</dt>
            <dd>{{$todo->id}}</dd>
            <dt>Project</dt>
            <dd>{{$todo->project->name}}</dd>
            <dt>Title</dt>
            <dd>{{$todo->title}}</dd>
            <dt>Description</dt>
            <dd>{{$todo->description}}</dd>
        </dl>
    </div>
</div>

<div class="row">
    <div class="col-sm-offset-1 col-sm-12">
        <a class="btn btn-default" href="{{URL::to('todos')}}">Back</a>
    </div>
</div>
@stop