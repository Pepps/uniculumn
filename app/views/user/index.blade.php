@extends('layouts.master')
@section('content')

@include('layouts.nav')
@yield('nav')

<div id="main_content">

          <div class="columnLeft">

              <div class="profile_picture">
              </div>

              <h2>Kontaktuppgifter</h2>
              <div id="contact_information">
                  <div class="contact_rows">Namn: {{ $user->firstname }} {{ $user->lastname }}. </div>
                  <div class="contact_rows">Ort:
                    @if($city != null)
                      {{ $city->name }}.
                    @endif
                    </div>
                  <div class="contact_rows">Tel: {{ $user->phone }}.</div>
                  <div class="contact_rows">Email: {{ $user->email }}.</div>
                }
              </div>

          </div>


         <div class="columnMiddle">

             <h2>{{ $user->firstname }} {{ $user->lastname }}</h2> <!--username-->
                <a href="/cv/{{ $user->id }}">Mitt CV</a>
                <div id="description"> <!--user personal description-->
                    {{ $user->description }}
                </div><hr>

                 <h2>Mina projekt</h2>
                 @if(sizeOf($projects) != 0)
                   @foreach($projects as $project)
                    <div class="project_description">
                      <div class="icon audio"></div>
                      <h2> {{ $project->title }} </h2>
                        {{ $project->body }}
                       <a href="">Läs mer...</a>
                    </div>
                    @endforeach
                  @endif
            </div>



           <div class="columnRight">

                   <div id="interests">

                       <h2>Intresserad av</div></h2>
                        @if(sizeOf($usedcategories) != 0)
                          @foreach($usedcategories as $category)
                            <span class="hashtag">{{ $category->title }}</span>
                          @endforeach
                        @endif
                     </div>

                    <div id="my_experiences">
                        <h2>Utbildningar</h2>
                        @if(sizeOf($experience) != 0)
                          @foreach($experience as $xp)
                            @if ($xp->type == 1)
                              {{ $xp->location }}
                              {{ $xp->descripton }}
                            @endif
                          @endforeach
                        @endif

                        <h2>Anställningar</div></h2>
                        @if(sizeOf($experience) != 0)
                          @foreach($experience as $xp)
                            @if ($xp->type == 0)
                              {{ $xp->location }}
                              {{ $xp->descripton }}
                            @endif
                          @endforeach
                        @endif
                    </div>

          </div>




        </div>

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
