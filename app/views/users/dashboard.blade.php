@section('content')
<div class="row-fluid">
    <div class="col-lg-12">
          <h2>Welcome {{Auth::user()->username}}</h2>
    </div>
</div>
<div class="row-fluid">
    <div class="col-lg-12">
        {{ HTML::link('/roles', 'Roles',  true)}}
        {{ HTML::link('/users', 'User',  true)}}
        {{ HTML::link('/projects', 'Projects',  true)}}
        {{ HTML::link('/bug_types', 'Bug Types',  true)}}
        {{ HTML::link('/bug_statuses', 'bug Statuses',  true)}}
        {{ HTML::link('/bugs', 'Bugs',  true)}}
    </div>
</div>
@stop