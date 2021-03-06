@extends('layouts.master')
@section('content')

@include('layouts.nav')
@yield('nav')

      <div id="main_content">


      <div id="account_wrapper">
        <h1 class="cv">Sök efter CV:n</h1>
        <br/><br/>
                  <div class="searchbox" style="display: inline-block;">
                    <div class="search_logo"></div>
                      <div class="search_bubble"><div class="bubble_tip"></div> Sök med hjälp av användarens förnamn, efternamn eller email!</div>
                      </div>
            <div class="upload_column">
                    <div class="dark_icon cv_icon"></div>
                     <h3>&nbsp;Namn/email</h3>
                    <input class="uploadfile" id="userserachval">
                    <input type="button" id="userserachbtn" class="dark_submit" value="Sök användare">
                  </div>
              </div>


              <div id="profile_wrapper">
        <h2>Sökresultat</h2>

        <table class="cv_src_results"></table>

      </div>

    </div>
@stop
