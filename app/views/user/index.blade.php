@extends('layouts.master')
@section('content')

@include('layouts.nav')
@yield('nav')

<div id="main_content">


          <div class="columnLeft">

              <div class="profile_picture">
              </div>

              <h2>Kontaktuppgifter <div class="edit_icon"></div></h2>
              <div id="contact_information">
                  <div class="contact_rows">Namn: {{ $user->firstname }}. </div>
                  <div class="contact_rows">Ort: {{ $user->lastname }}.</div>
                  <div class="contact_rows">Tel: {{ $user->phone }}.</div>
                  <div class="contact_rows">Email: {{ $user->email }}.</div>
                }
              </div>

          </div>


         <div class="columnMiddle">

             <h2>Severus Snape</h2> <!--username-->

                <div id="description"> <!--user personal description-->

                    <p>
                      Bacon ipsum dolor amet biltong pork loin brisket pork cow ribeye meatball flank andouille. Corned beef kielbasa chicken, pancetta short ribs pig jerky. Ground round beef prosciutto short ribs bacon. Strip steak jerky biltong flank drumstick venison tenderloin turkey porchetta turducken!
                    </p>

                    <p>
                      Cupim salami shoulder picanha. Cow chicken venison tail, shank brisket hamburger. Filet mignon short loin sausage brisket, cupim shank cow pig porchetta frankfurter pork loin hamburger meatball turkey. Frankfurter tenderloin porchetta turkey. Pork belly bresaola tail ball tip kielbasa tenderloin pork loin pancetta jerky. Brisket capicola pork loin drumstick tenderloin landjaeger.  <div class="edit_icon"></div>
                    </p>

                  </div>


                 <h2>Mina projekt <div class="edit_icon"></div></h2>
                  <div class="project_description">
                    <div class="icon audio"></div>
                    <h2> {{ $user->title }} </h2>
                     <a href="">Läs mer...</a>

                  </div>

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
