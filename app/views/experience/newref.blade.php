<!-- app/views/experience/create.blade.php -->
@extends('layouts.master')

@section('content')
<div class="container">
@include('project.projectnav')
@yield('projectnav')

<h1>Add references</h1>
<!-- If there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => '/experience/' . $expid . '/addref/', 'method'=>'post')) }}
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


    {{ Form::submit('Add experience', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}



</div>
@stop
