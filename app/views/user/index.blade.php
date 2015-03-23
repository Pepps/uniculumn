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
                   @foreach($projects as $project)
                    <div class="project_description">
                      <div class="icon audio"></div>
                      <h2> {{ $project->title }} </h2>
                        {{ str_limit($project->body, $limit = 30, $end = '...') }}
                       <a href="/project/show/{{ $project->id }}" style="float:right; margin-right: 1vw;">Läs mer</a>
                    </div>
                    @endforeach
            </div>



           <div class="columnRight">

                   <div id="interests">

                       <h2>Intresserad av</div></h2>
                          @foreach($usedcategories as $category)
                            <span class="hashtag">{{ $category->title }}</span>
                          @endforeach
                     </div>

                    <div id="my_experiences">
                        <h2>Utbildningar</h2>
                          @foreach($experience as $xp)
                            @if ($xp->type == 1)
                              <h3>{{ $xp->location }}</h3>
                              <h4>{{ $xp->description }}</h4>
                            @endif
                          @endforeach


                        <h2>Anställningar</h2>
                          @foreach($experience as $xp)
                            @if ($xp->type == 0)
                              <h3>{{ $xp->location }}</h3>
                              <h4>{{ $xp->description }}</h4>
                            @endif
                          @endforeach
                    </div>

          </div>
        </div>
@stop
