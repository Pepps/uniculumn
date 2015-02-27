<!-- app/views/projects/create.blade.php -->
@extends('layouts.master')

@section('content')
<div class="container">

@include('project.projectnav')
@yield('projectnav')

<h1>Updatera Projekt</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'user/update/'.$project->id)) }}

    <div class="form-group">
        {{ Form::text('project_title', $project->title, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('project_body', 'Beskrivning') }}
        {{ Form::textarea('project_body', $project->body, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Update the project!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
@stop
