@extends('layouts.master')
@section('content')

@include('layouts.nav')
@yield('nav')

      <div id="main_content">


          <div class="columnLeft">

              <div class="profile_picture">
              </div>

              <h2>Kontaktuppgifter <a href="user/{{$user->id}}/edit"><div class="edit_icon"></div></a></h2>
              <div id="contact_information">
                <div class="contact_rows">Namn: {{$user->firstname.' '.$user->lastname}}</div>
                <div class="contact_rows">Ort: @if($nocity) Inte verifierat @else {{$city->name.', '.$state->name}}@endif</div>
                <div class="contact_rows">Tel: {{$user->phonenumber}}</div>
                <div class="contact_rows">Email: {{$user->email}} </div>
              </div>

          </div>


         <div class="columnMiddle">

             <h2>{{$user->firstname}}</h2> <!--username-->

                <div id="description"> <!--user personal description-->

                  </div>


                 <h2>Mina projekt <div class="edit_icon"></div></h2>
                <span style="display: none;">{{$i = 1}}</span>

            </div>



           <div class="columnRight">

                   <div id="interests">

                       <h2>Intresserad av <div class="edit_icon"></div></h2>

                      <span id="hashtag">trolldrycker</span> <span id="hashtag">maktmissbruk</span> <span id="hashtag">lily potter</span>  <span id="hashtag">svartkonster</span>
                      <span id="hashtag">spionage</span> <span id="hashtag">hämnd</span>

                     </div>

                    <div id="my_experiences">
                        <h2>Utbildningar <div class="edit_icon"></div></h2>

                        <h3>Trolldryckskonst 402</h3>
                        <h4>Hogwarts Skola för Trollkonster & Trolldom</h4>

                        <h2>Anställningar <div class="edit_icon"></div></h2>

                        <h3>Trolldryckslärare</h3>
                        <h4>Hogwarts Skola för Trollkonster & Trolldom</h4>

                        <h3>Dubbelagent</h3>
                        <h4>Albus Dumbledore & Lord Voldemort</h4>
                    </div>

          </div>




        </div>












<!-- will be used to show any messages -->
<!--
<table class="table table-striped table-bordered">
  <tr><td>{{ $user->lastname }}</td></tr>
  <tr><td>{{ $user->email }}</td></tr>
  <tr><td>{{ $user->state }}</td></tr>
  <tr><td>{{ $user->address }}</td></tr>
  <tr><td>{{ $user->postnumber }}</td></tr>
  <tr><td>{{ $user->phone }}</td></tr>
  @if(!$nocity)
    <tr><td>{{ $state->name }}</td></tr>
    <tr><td>{{ $city->name }}</td></tr>
  @endif
</table>

<a class="btn btn-small btn-info" href="user/{{$user->id}}/edit">Redigera</a>
 -->
<script>

  window.onload = function(){

      $("#delmodal-btn").on("click", function(){
        $('#delete').modal('show');
        $('.modal-backdrop').css( "zIndex", -1030 );
        $("#delete-pt").text($(this).parent().parent().find(".pt").text());
        $('#del-btn').attr('href','/project/delete/'+$(this).parent().parent().find(".pi").text());
      });

  }

</script>
<!--
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4 style="text-align:center;">Är du säker på att du vill ta bort <b><span id="delete-pt"></span></b>?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>
        <a class="btn btn-danger" id="del-btn">Ta bort!</a>
      </div>
    </div>
  </div>
</div>
 -->
@stop
