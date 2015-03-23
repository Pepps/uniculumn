@extends('layouts.master')
@section('content')

@include('layouts.nav')
@yield('nav')

      <div id="main_content">

        <div class="url_wrapper">
          <img src="img/search.PNG" style="width: 0.7vw; height: 0.7vw; margin-right: 0.5vw;"/><span id="url"></span><br/><br/>

          <h2>Dina sökningar:</h2>


          <div class="search_log">

            <!-- hatar tabeller :@@@@ -->
            <table id="table" style="width: 20vw; vertical-align: top;">
              <tr>
                <td class="td_category"><b>Kategori</b></td>
                <td class="td_words"><b>Sökord</b></td>
                <td class="td_delete"><b>Ta bort</b></td>
              </tr>
            </table>

          </div>

          </div>

        <div class="search_wrapper">

          <div class="searchbox" id="search_in">
            <div class="search_logo"></div>
              <div class="search_bubble"><div class="bubble_tip"></div> Vad vill du söka i?</div>
        </div>

       <div style="clear: both;"></div>
       <form>
        <div class="choicebox" id="hide_me2">

            <!-- allt detta är en jävla mess, sry -->
           <div class="s_users dark_square"><input type="radio" name="fgg1" value="user"><label for="user"><span><span></span></span>Användare</label></div>
           <div class="option dark_square s_projects"> <input type="radio" name="fgg1" value="projects"><label for="projects"><span><span></span></span>Projekt</label></div>
           <div class="option dark_square s_experiences"><input type="radio" name="fgg1" value="experiences"><label for="experiences"><span><span></span></span>Erfarenheter</label> </div>
           <div class="option dark_square s_categories"> <input type="radio" name="fgg1" value="categories"><label for="categories"><span><span></span></span>Kategori</label></div>
           <div class="option dark_square s_status"> <input type="radio" name="fgg1" value="status"><label for="status"><span><span></span></span>Status</label></div>
        </div>
      </form>


   <div class="searchbox" id="search_for">
    <form id="keysform" style="display:none">
       <div class="search_logo"></div><div class="search_bubble"><div class="bubble_tip"></div> Vad vill du söka efter?</div>

        </div>
       <div style="clear: both;"></div>

       <div class="choicebox" id="hide_me">
       <div class="key dark_square s_users"><input class="key" type="checkbox" value="user"><label for="user22"><span><span></span></span>Användare</label></div>
       <div class="key dark_square s_projects"><input class="key" type="checkbox" value="projects"><label for="projects22"><span><span></span></span>Projekt</label></div>
       <div class="key dark_square s_experiences"><input class="key" type="checkbox" value="experiences"><label for="experiences22"><span><span></span></span>Erfarenheter</label></div>
       <div class="key dark_square s_categories"><input class="key" type="checkbox" value="categories"><label for="categories22"><span><span></span></span>Kategori</label></div>
       <div class="key dark_square s_status"><input class="key" type="checkbox" value="status"><label for="status22"><span><span></span></span>Status</label></div>
    </form>


      <h2 id="input_fields"></h2>

        </div>

        </div>
        </div>

@stop
