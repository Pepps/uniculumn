<?php
/**
 * Created by PhpStorm.
 * User: denaton
 * Date: 2015-03-18
 * Time: 11:00
 */
?>
@extends('layouts.master')
@section('content')
@yield('nav')

<img src="img/header2.png" width="400" height="150" alt="logo" />
<div id="body">
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
                {{Form::submit('Registrera dig', array('id' => 'skicka'))}}
            {{ Form::close() }}
        </div>
    </div>
</div>
