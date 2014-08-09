<?php //echo "<pre>"; print_r($project->toArray()); exit;?>
@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="{{URL::to('/dashboard')}}">Home</a></li>
            <li><a href="{{URL::to('/projects')}}">Projects</a></li>
            <li class="active">View Project Details</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">

        <dl class="dl-horizontal">
            <dt>Id</dt>
            <dd> {{ $project->id }}</dd>

            <dt>Project Name</dt>
            <dd>{{ $project->name }}</dd>

            <dt>Active</dt>
            <dd>{{ $project->is_active }}</dd>

            <dt>Created By</dt>
            <dd></dd>

            <dt>Created On</dt>
            <dd> {{ $project->created_at }}</dd>

            <dt>Modified On</dt>
            <dd> {{ $project->updated_at }}</dd>

        </dl>

    </div>
</div>


@stop