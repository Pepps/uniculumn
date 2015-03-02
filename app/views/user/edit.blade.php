<!-- app/views/projects/create.blade.php -->
@extends('layouts.master')

@section('content')
<div class="container">

@include('project.projectnav')
@yield('projectnav')

<h1>Updatera Din</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'user/update/'.$user->id)) }}

    <div class="form-group">
        {{ Form::text('user_title', $user->firstname, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::text('project_body', $user->lastname, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::text('project_body', $user->email, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Updatera din profil', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
@stop
