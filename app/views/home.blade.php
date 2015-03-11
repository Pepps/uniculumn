@extends('layout')

@section('content')


<div id="header">
    <div id="headerpic">
             <img src="img/header.png" width="1000" height="200" alt="header" />
    </div>
</div>


<body>


<div id="roligbox">
      <img src="img/penna.png"><img src="img/ladda.png"><img src="img/gubbe.png">
      <h1>Ladda upp projekt och n&auml;tverka med arbetsgivare</h1>
</div>

      <div id="loginbox">

        {{ Form::open(array('url' => 'home','method' => 'post')) }}

    <!-- if there are login errors, show them here -->
    @if (Session::get('loginError'))
    <div class="alert alert-danger">{{ Session::get('loginError') }}</div>
    @endif


      {{ $errors->first('email') }}
      {{ $errors->first('password') }}



      {{ Form::label('email', 'Email Address') }}
      {{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com')) }}
      {{ Form::label('password', 'Password') }}
      {{ Form::password('password') }}
      {{ Form::submit('Login') }}
      {{ Form::close() }}

<br>


<div id="finbox">
    <p>Med en portfolio online g&ouml;r du det enkelt f&ouml;r f&ouml;retag att skicka jobberbjudande<br> som matchar just dina kompentenser.</p>
    <h1>Registrera dig idag, det &auml;r enkelt och gratis!</h1>
    <img src="img/big_logo.png" width="160" height="160" alt="logo">
</div>

@stop
