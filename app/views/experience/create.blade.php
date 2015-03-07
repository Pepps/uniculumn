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
        {{ Form::label('from', 'From') }}
        {{ Form::text('duration', Input::old('name'), array('class' => 'form-control', 'placeholder' => 'YYYY/MMMM/DDDD')) }}
        {{ Form::label('to', 'To') }}
        {{ Form::text('duration', Input::old('name'), array('class' => 'form-control', 'placeholder' => 'YYYY/MMMM/DDDD')) }}
    	</div>
	</div>
    <br>
    <h1>References</h1>

    <div class="form-group">
        {{ Form::label('company', 'Company') }}
        {{ Form::text('company', Input::old('name'), array('class' => 'form-control')) }}
        {{ Form::label('firstname', 'First name') }}
        {{ Form::text('firstname', Input::old('name'), array('class' => 'form-control')) }}
        {{ Form::label('lastname', 'Last name') }}
        {{ Form::text('lastname', Input::old('name'), array('class' => 'form-control')) }}
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', Input::old('name'), array('class' => 'form-control')) }}
        {{ Form::label('phone', 'Phone') }}
        {{ Form::text('phone', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">

    </div>
    		{{ Form::submit('Add experience', array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}



</div>
@stop

