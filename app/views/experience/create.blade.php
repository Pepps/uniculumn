<!-- app/views/experience/create.blade.php -->
@extends('layouts.master')

@section('content')
<div class="container">
@include('project.projectnav')
@yield('projectnav')


<h1>Lägg till erfarenheter</h1>

<!-- If there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'experience', 'method'=>'post')) }}


    <div class="form-group">
        {{ Form::label('title', 'Titel') }}
        {{ Form::text('title', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
    	<div class="col-xs-2">
        {{ Form::label('duration', 'Duration') }}
        {{ Form::text('duration', Input::old('name'), array('class' => 'form-control')) }}
    	</div>
	</div>
    <br>

    		{{ Form::submit('Add experience', array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}



</div>
@stop
