
@section('content')

<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="{{URL::to('/dashboard')}}">Home</a></li>
            <li class="active">Projects</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h1>Project <a class="btn btn-small btn-success" href="{{ URL::to('projects/create') }}"><span class="glyphicon glyphicon-plus"></span> Add Project</a></h1>

        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif


        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Created</td>
                <td>Active</td>
                <td>Logo</td>

            </tr>
            </thead>
            <tbody>

            @foreach($projects as $key => $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->name}}</td>
                <td>{{{$project->user->first_name or 'Not available'}}}</td>
                <td>@if($project->is_active==1) Yes @else No @endif</td>
                <td>{{ $project->logo}}</td>
                <td>
                    {{ Form::open(array('url' => 'projects/' . $project->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-warning','onClick'=>'return confirm("Are you sure to delete?")')) }}
                    {{ Form::close() }}

                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    <a class="btn btn-small btn-primary pull-right" href="{{ URL::to('projects/' . $project->id . '/edit') }}">Edit</a>

                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                    <a class="btn btn-small btn-info pull-right" href="{{ URL::to('projects/' . $project->id) }}">view</a>

                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php //echo $projects->links(); ?>
    </div>
</div>
@stop