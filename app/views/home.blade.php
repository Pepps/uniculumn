@extends('layout')

@section('content')

  <div id="header">
    <img src="img/header_title.PNG"/>
  </div>
  <div id="welcome">
    <div class="column_left">

      <div class="welcome_box">
        <span class="trigger_login">Logga in </span>eller <br/>
        <span class="trigger_registration">registrera dig</span>

      </div>

      <div class="registration_box">
        {{ Form::open(array('url' => 'register_action','method' => 'post')) }}
      @if($errors->any())
      <div class="alert alert-error">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
      </div>
      @endif
     <!-- {{ Form::token('token')}}-->
      {{ Form::text('fname', '', array('placeholder' => 'Förnamn')) }} <br>
      {{ Form::text('lname', '', array('placeholder' => 'Efternamn')) }} <br>
      {{ Form::text('email', '', array('placeholder' => 'Email')) }}<br>
      {{ Form::password('password', array('placeholder' => 'Lösenord')) }}<br>
      {{ Form::password('cpassword', '', array('placeholder' => 'Bekräfta lösenord')) }} <br>
      <a href="#" class="back_to_welcome"></a>
      {{ Form::submit('Register', array('class' => 'register_button')) }} <br>
      {{ Form::close() }}
       <!-- <form>
          &nbsp; &nbsp;För/efternamn:
          <input type="text" name="username"><br>
          &nbsp;Email:
          <input type="text" name="username"><br>
          Lösenord:
          <input type="text" name="password"><br>
          &nbsp; &nbsp;Bekräfta lösenord:
          <input type="text" name="password"><br>
          <div class="back_to_welcome"></div>
          <div class="register_button">Registrera dig</div>

        </form>-->
      </div>

      <div class="login_box">
        @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
        @endif
      </div>

    </div>
    <div class="column_right">
      Bläddra <span class="dark">bland</span> &nbsp; &nbsp;<br/>
      &nbsp; &nbsp; +1000 projekt
    </div>
  </div>

  <div id="footer">
    <div class="footer_box">
      <h2>
        Kontakt
      </h2>
      Lorem ipsum dolor sit amet<br/>
      consectetur adipiscing elit<br/>
      sed do eiusmod tempor.df..<br/>
      083653473
    </div>
    <div class="footer_box">
      <h2>
        Om oss
      </h2>
      Lorem ipsum dolor sit amet<br/>
      consectetur adipiscing elit<br/>
      sed do eiusmod tempor.df..<br/>
    </div>
    <div class="blue_box">


      <div class="login_box">

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


       <?php// if(!empty(Session::get('key'))) $name = Session::get('key'); ?>

          <!--
          Author: Joakim D Google loginbutton
        -->

       <!-- {{ Form::submit('Login') }}-->

        <!--<span id="signinButton">
        <span class="g-signin"
        data-callback="signinCallback"
        data-clientid="179291477685-vmnc97hujne8rf4rv7ihtpta15fvbbf1.apps.googleusercontent.com"
        data-cookiepolicy="single_host_origin"
        data-requestvisibleactions="http://schema.org/AddAction"
        data-scope="https://www.googleapis.com/auth/plus.login">
        </span>
        </span>

          <a href="user.html"><div class="login_button">Logga in</div></a>
        <!-->
        </form>
      </div>



    </div>
  </div>

@stop
