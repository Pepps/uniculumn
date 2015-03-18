@extends('layouts.master')
@section('content')

<div class="container">

@include('layouts.nav')
@yield('nav')

<div id="main_content">
  <div id="my_projects">
      <h1>Mina projekt</h1>

      @foreach ($projects as $value)
      <div class="ex_column">

    <div class="ex ico_audio">
      Ljud
    </div>

      <div class="edit_wrapper project_list">

           <!-- <Kategori/created at>  -->
              <div class="ex_float hide_this exp_location">{{ User::find($value->owner_id)->email}}{{ HTML::image('img/icons/blue/employer.PNG') }}</div>
              <div class="ex_float hide_this">{{str_limit($value->created_at, $limit = 10, $end = '')}} {{ HTML::image('img/icons/edit/clock.PNG') }}</div>
           <!-- </Plats/tid>  -->

           <!-- </Redigera plats/tid>  -->
                <span class="proj_id" style="display:none;">{{$value->id}}</span>
           <!-- <Kontrollknappar>  -->
                @if(Auth::user()->id == $value->owner_id)
                  <div class="ex_button delete_btn" style="background-color: #d70808;">{{ HTML::image('img/icons/edit/delete.PNG') }}</div>
                  <div class="ex_button edit_experience">{{ HTML::image('img/icons/edit/edit.PNG') }}</div>
                  <div class="ex_button edit_references">{{ HTML::image('img/icons/edit/add.PNG') }}</div>
                @endif
                <div class="ex_button">{{ HTML::image('img/icons/edit/search.PNG') }}</div>

                <!-- <Spara ändringar>  -->
                <div class="ignore_ref_edit edit_this">Stäng</div>
                <!-- </Spara ändringar>  -->
                <!-- </Kontrollknappar>  -->
              </div>


             <!-- <Titel>  -->
                <h2 class="hide_this">{{ $value->title }}</h2>
             <!-- </Titel>  -->

             <div class="ex_description">
             <!-- <Beskrivning>  -->
               <span class="hide_this">{{$value->body}}</span>

              <!-- </Beskrivning>  -->

              {{ Form::open(array('url' => 'update'.$value->id)) }}
                {{ Form::text('project_title', $value->title, Array('class'=>'edit_this')) }}
                {{ Form::textarea('project_body', $value->body, Array('class'=>'edit_this')) }}
                {{ Form::submit('Spara', Array('class'=>'edit_this')) }}
              {{ Form::close() }}
             </div>

          <!-- <Lägg till projektmedlemmar>  -->
            <div class="references_choices">

                <div class="ref_column">

                  <h2> Lägg till projektmedlemmar</h2>

                  {{ Form::open(array('url' => 'project/addcolab/'.$value->id)) }}
                   <div id="bloodhound">
                      {{ Form::text('collaborators-form', Input::old('name'), array('class' => 'typeahead', 'id' => 'input-collaborators')) }}
                       {{ Form::submit('Lägg till', array('class' => 'add_selected_member')) }}
                    </div>
                  {{ Form::close() }}
                </div>

                <div class="ref_column">
                  <div class="addreference">
                     Klar
                  </div>
                  <div class="clearreference">
                      Ångra
                  </div>
                </div>
              </div>

             <!-- </Lägg till projektmedlemmar>  -->



             <!-- <Referenser>  -->
            <div class="show_references">
            {{ HTML::image('img/small_menu.PNG') }} Visa projektmedlemmar  <div class="show_tags">{{ HTML::image('img/hashtag.PNG') }} Visa taggar</div><br/>
              <span style="display:none;" class="projectid">{{$value->id}}</span>

              <div class="allreferences">
                @foreach($value->users as $user)
                  @if($user->id != $value->owner_id)
                    <div class='project_members_square'>
                      <span class="member_id" style="display:none;">{{$user->id}}</span>
                      <span class="member_projid" style="display:none;">{{$value->id}}</span>
                      <div class='delete_member'>{{ HTML::image('img/icons/edit/delete.PNG') }}</div>
                      <span class='label label-info'>{{$user->email}}</span>
                      {{ HTML::image('img/avatar.PNG') }}
                    </div>
                  @endif
                @endforeach
              </div>

              <div class="alltags">
                @foreach($value->category as $category)
                  <span>#{{$category->title}}</span>
                @endforeach
              </div>


            </div>
          </div>
        @endforeach
@stop
