<!-- app/views/projects/create.blade.php -->
@extends('layouts.master')

@section('content')
<div class="container">

@include('project.projectnav')
@yield('projectnav')

<h1>Updatera Projekt</h1>

@if ( $project->user_id == Auth::user()->id)
{{ Form::open(array('url' => 'project/addcolab/'.$project->id)) }}
  <div class="form-group" id="bloodhound">
      {{ Form::label('collaborators-form', 'Medarbetare') }}
      {{ Form::text('collaborators-form', Input::old('name'), array('class' => 'typeahead form-control', 'id' => 'input-collaborators')) }}
      {{ Form::submit('Update the project!', array('class' => 'btn btn-success')) }}
  </div>
{{ Form::close() }}
<h3>
  @foreach ($users as $user)
    @if($user->id != Auth::user()->id)
      <span class="label label-info">{{$user->email}} <a href="/project/delcolab/{{$project->id}}/{{$user->id}}" style="color: #fff;"><i class="fa fa-times"></i>
</a></span>
    @endif
  @endforeach
</h3>
@endif
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'project/update/'.$project->id)) }}

    <div class="form-group">
        {{ Form::label('project_title', 'Titel') }}
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
