<!-- app/views/projects/create.blade.php -->
@extends('layouts.master')

@section('content')
<div class="container">

@include('project.projectnav')
@yield('projectnav')

<h1>Updatera Din Profil</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'user/update/'.$user->id)) }}

    <div class="form-group">
        {{ Form::text('user_title', $user->firstname, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::text('lastname', $user->lastname, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::text('email', $user->email, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::text('address', $user->address, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::text('postnumber', $user->postnumber, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::text('phone', $user->phone, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::select('state', array('0' => 'Välj ditt län'), Input::old('state'), array('class' => 'form-control', 'id' => 'state')) }}
    </div>

    <div class="form-group">
        {{ Form::select('city', array('0' => 'Välj din stad'), Input::old('state'), array('class' => 'form-control', 'id' => 'city')) }}
    </div>

    {{ Form::submit('Updatera din profil', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
@stop
