<!-- app/views/projects/create.blade.php -->
@extends('layouts.master')

@section('content')
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('Project') }}">Project Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('projects') }}">View All Projects</a></li>
        <li><a href="{{ URL::to('project/create') }}">Create a Project</a>
    </ul>
</nav>

<h1>Registrera Projekt</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'Project')) }}

    <div class="form-group">
        {{ Form::label('project_title', 'Titel') }}
        {{ Form::text('project_title', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('project_body', 'Beskrivning') }}
        {{ Form::textarea('project_body', Input::old('project_body'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('category', 'Kategori') }}
        {{ Form::select('category', array('0' => 'Select a Project Type', '1' => 'Hemligt bajs', '2' => 'Ekonomi'), Input::old('category'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group" id="subcategory-form">
    </div>

    <div class="form-group">
        {{ Form::label('user_id', 'Användarnamn') }}
        {{ Form::text('user_id', Input::old('user_id'), array('class' => 'form-control')) }}
    </div>

    <!---
    / HIDDEN FORMS
    -->

    {{ Form::text('subcategory_id', Input::old('category'), array('class' => 'hidden', 'id' => 'subcategory_id')) }}

    {{ Form::submit('Create the Project!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop
