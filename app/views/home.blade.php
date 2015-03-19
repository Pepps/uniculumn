@extends('layout')
@section('content')

<style>
  body{
    background: #fff;
  }
</style>
<div id="a-wrapper">
  <div id="aheader">
    {{ HTML::image('img/header.png', 'Header image',Array('id' => 'headerimg')) }}
  </div>


  <br>
  <div id="roligbox">
  			<img src="img/penna.png"><img src="img/ladda.png"><img src="img/gubbe.png">
  			<h1>Ladda upp projekt och n&auml;tverka med arbetsgivare</h1></div>
  <div id="loginbox">

  		<form id="form" name="form" method="post" action=" ">
  			E-Mail<br><input type="text" name="username" id="username"/><br>
  			L&ouml;senord<br><input type="password" name="password" id="password"/><br><br>
        {{ HTML::image('img/loggain.png', 'loggin btn',Array('id' => 'loggin-btn', 'class' => 'a-btn' )) }}
  		</form>
  </div>

  <div id="finbox">
  		<p>Med en portfolio online g&ouml;r du det enkelt f&ouml;r f&ouml;retag att skicka jobberbjudande<br> som matchar just dina kompentenser.</p>
  		<a href="/register">{{ HTML::image('img/regi.png', 'register btn',Array('class' => 'a-btn' )) }}</a><br><br>
      {{ HTML::image('img/big_logo.png', 'Big logo', Array('id' => 'abigloggo')) }}
  </div>
</div>

<script>
  window.onload =  function(){
    $("#loggin-btn").on("click", function(){
      $.ajax({
        method: "POST",
        url: "/home",
        data: { email: $("#username").val(), password: $("#password").val() }
      }).done(function(data) {
        window.location.replace("/")
        }).fail(function() {
          console.error("Something went wrong!");
        });
    });
  }
</script>
@stop
