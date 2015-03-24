@extends('layout')
@section('content')

<style>
  body{
    background: url(img/background_gradient.PNG) transparent top repeat-x;
  }
</style>
<div id="a-wrapper">
  <div id="aheader">
    <a href="/">{{ HTML::image('img/header.png', 'Header image',Array('id' => 'headerimg')) }}</a>
  </div>


  <br>
  <div id="roligbox">
		<img src="img/penna.png"><img src="img/ladda.png"><img src="img/gubbe.png">
		<h2> 
      <ul style="list-style: none;">
        <li>Ladda upp projekt som du eller ditt team har skapat.</li>
        <li>Dela dina erfarenheter och berätta om dina intressen.</li>
        <li>Redigera din profil.</li>
        <li>Generera ditt CV!</li>
      </ul>
    </h2>
  </div>
  <div id="loginbox">
      {{ Form::open(array('url' => '/home', 'id'=>'form')) }}
        @if($errors->has())
          <p style="margin-top: -1.2vw; margin-bottom: -0.15vw;">Email eller lösenordet är inkorrekt, försök igen!</p>
        @endif
        E-Mail<br>{{ Form::text('email',"", Array('id'=>'username')) }}<br>
        Lösenord<br>{{ Form::password('password',Array('id'=>'password')) }}<br><br>
        {{ Form::submit('Logga in', Array('class'=>'skicka')) }}
      {{ Form::close() }}
</div>

  <div id="finbox" style="font-family: Kozuka;">
  		<p>Med en portfolio online gör du det enkelt förr företag att skicka jobberbjudande<br> som matchar just dina kompentenser.</p>
  		<a href="/register">{{ HTML::image('img/regi.png', 'register btn',Array('class' => 'a-btn' )) }}</a><br><br>
      {{ HTML::image('img/big_logo.PNG', 'Big logo', Array('id' => 'abigloggo')) }}
  </div>
</div>

@stop
