@extends('layout')
@section('content')

<style>
  body{
    background: #fff;
  }
</style>

<div id="a-wrapper">
  <div id="aheader">
    <div id="headerpic">
             {{ HTML::image('img/header.png') }}
    </div>
  </div>

  <div id="roligbox">
        {{ HTML::image('img/penna.png') }}{{ HTML::image('img/ladda.png') }}{{ HTML::image('img/gubbe.png') }}
  			<h1>Ladda upp projekt och n&auml;tverka med arbetsgivare</h1>
  </div>

  <div id="loginbox">
    <div style="margin-top:-25px;">
      {{ Form::open(array('url' => '/home', 'id'=>'form')) }}
        @if($errors->has())
          <p>Email eller lösenordet är inkorrekt, försök igen!</p>
        @endif
        E-Mail<br>{{ Form::text('email',"", Array('id'=>'username')) }}<br>
        L&ouml;senord<br>{{ Form::password('password',Array('id'=>'password')) }}<br><br>
        {{ Form::submit('Logga in', Array('class'=>'skicka')) }}
        <a href="#" class="skicka">Registrera dig</a>
      {{ Form::close() }}
    </div>
  </div>
  <br>


  <div id="finbox">
  		<p>Med en portfolio online g&ouml;r du det enkelt f&ouml;r f&ouml;retag att skicka jobberbjudande<br> som matchar just dina kompentenser.</p>
  		<h1>Registrera dig idag, det &auml;r enkelt och gratis!</h1>
  		<img src="img/big_logo.png" width="160" height="160" alt="logo">
  </div>
</div>
@stop
