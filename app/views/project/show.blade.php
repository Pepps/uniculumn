@extends('layouts.master')

@section('content')

@include('layouts.nav')
@yield('nav')

   <div id="main_content">

          <div class="view_this_project_wrapper">
                  <h1>{{ $project->title }}</h1>

<div class="view_this_project_files">


  <div class="view_these_files"> <h3>Filer</h3></div>

  @if ($file != "null")
      @foreach($file as $files)
  <a href="/project/getfiles/{{ $project->id }}/{{ basename($files) }}" class="file_list file_image">{{ basename($files) }} <br></a>

    @endforeach
  @else
    <p> Det finns inga filer här </p>
  @endif
</div>


                <div class="view_this_project_members">
          <div class="hide_these_members">Dölj projektmedlemmar</div>
          <div class="view_this_date">Skapad: {{str_limit($project->created_at, $limit = 10, $end = '')}} </div>
                  <div class="project_members_square">
                    {{ HTML::image('img/avatar.PNG') }}<br/>
                     <span style="color: #D6AB00;">{{ User::find($project->owner_id)->firstname }}</span>
                      </div>

                    @foreach($project->users as $user)
                    @if($user->id != $project->owner_id)
                   <a href="/profile/{{$user->id}}">
                    <div class="project_members_square">
                              {{ HTML::image('img/avatar.PNG') }}<br/>
                                  {{ $user->firstname }}
                          </div></a>
                            @endif
                           @endforeach
                          <!--  dont remove -->
                          <div style="clear: both;"></div>

                </div>
<div class="view_this_project_tags">
                @foreach($project->category as $category)
                  <span>#{{$category->title}}</span>
                @endforeach
</div>
<div class="this_project_description"></div>
<div class="view_this_project_description">
{{ Markdown::parse($project->body) }}
    </div>
                </div>
      </div>


@stop
