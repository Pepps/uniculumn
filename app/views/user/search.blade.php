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
                    <input class="uploadfile">
                    <input type="submit" class="dark_submit" value="Få resultat"></input></input>
                  </div>
              </div>


              <div id="profile_wrapper">
        <h2>Sökresultat</h2>

        <table class="cv_src_results">
        <tr>
        <td class="cv_src_face">{{ HTML::image('img/avatar.PNG') }}</td>
          <td class="cv_src_name"><span>Albus-Brian-Wulfric Dumbledore</span></td>
          <td class="cv_src_profile"><span>Profil »</span></td>
          <td class="cv_src_cv"><span>CV »</span></td>
        </tr>
        <tr>
        <td class="cv_src_face">{{ HTML::image('img/avatar.PNG') }}</td>
          <td class="cv_src_name"><span>Ronald Weasley</span></td>
          <td class="cv_src_profile"><span>Profil »</span></td>
          <td class="cv_src_cv"><span>CV »</span></td>
        </tr>
        <tr>
        <td class="cv_src_face">{{ HTML::image('img/avatar.PNG') }}</td>
          <td class="cv_src_name"><span>Harry Potter</span></td>
          <td class="cv_src_profile"><span>Profil »</span></td>
          <td class="cv_src_cv"><span>CV »</span></td>
        </tr>
        </table>

      </div>

    </div>



@stop
