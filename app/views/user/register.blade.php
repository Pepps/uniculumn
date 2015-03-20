@extends('layouts.master')
@section('content')
<style>
  body {
    background: #fff;
  }
</style>
<div class="index">
  <center>
    <a href="/">{{ HTML::image('img/header.png', 'Header image',Array('id' => 'headerimg')) }}</a>
    <div>
      <div id = "box">
        <h1>Skapa ett konto</h1>
        <div id="form">
          {{ Form::open(array('url' => 'register_action','action' => 'AuthController@store', 'method' => 'post')) }}
          {{Form::label('fname', 'Förnamn')}}<br>
          {{Form::text('fname')}}<br/>
          {{Form::label('lname', 'Efternamn')}}<br>
          {{Form::text('lname')}}<br/>
          {{Form::label('email', 'E-postadress')}}<br>
          {{Form::text('email')}}<br/>
          {{Form::label('password', 'Lösenord')}}<br>
          {{Form::password('password', array('id' => 'passw'))}}<br/>
          {{Form::label('cpassword', 'Lösenord igen')}}<br>
          {{Form::password('cpassword', array('id' => 'passw'))}}<br/>
          <br/>
          <br/>
          {{Form::submit('Registrera dig', array('class' => 'reg-btn'))}}
          {{ Form::close() }}
        </div>
      </div>
    </div>
    <div>
  </center>
</div>
@stop
