<!-- app/views/projects/create.blade.php -->
@extends('layouts.master')

@section('content')
<div class="container">

@include('project.projectnav')
@yield('projectnav')

<h1>Registrera Projekt</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'project')) }}

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
        {{ Form::select('category', array('0' => 'Select a project Type'), Input::old('category'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group" id="subcategory-form">
    </div>

    <div class="form-group" id="collaborators-form">
        {{ Form::label('collaborators-form', 'Medarbetare') }}
        {{ Form::text('collaborators-form', Input::old('name'), array('class' => 'typeahead form-control')) }}
        <button id=""></button>
    </div>


    <!---
    / HIDDEN FORMS
    -->

    {{ Form::text('subcategory_id', Input::old('category'), array('class' => 'hidden', 'id' => 'subcategory_id')) }}

    {{ Form::submit('Create the project!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
@stop
