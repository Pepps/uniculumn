@extends('layouts.master')

@section('content')

@include('layouts.nav')
@yield('nav')

   <div id="main_content">
    @foreach ($projects as $value)
          <div class="view_this_project_wrapper">
                  <h1>{{ $project->title }}</h1>

<div class="view_this_project_files">

    
  <div class="view_these_files"> <h3>Filer</h3></div>
  <a href="{{ URL::to('/project/getfiles/' . $value->id ) }}" class="file_list file_image">momo</a>
  <div class="file_list file_code">snape_website.php</div>
  <div class="file_list file_audio">snapesnape.mp3</div>
  <div class="file_list file_video">musicvideo.mov</div>
  <div class="file_list file_text">snapesdiary.txt</div>
  <div class="file_list file_file">broken_file.csv</div>
</div>
  

                <div class="view_this_project_members">
          <div class="hide_these_members">Dölj projektmedlemmar</div>
          <div class="view_this_date">Skapad: {{str_limit($project->created_at, $limit = 10, $end = '')}} </div>
                  <div class="project_members_square">
                    <img src="img/avatar.PNG"/><br/>
                     <span style="color: #D6AB00;">{{ User::find($value->owner_id)->firstname }}</span>
                      </div>

                    @foreach($value->users as $user)
                    @if($user->id != $value->owner_id)
                   <div class="project_members_square">
                              <img src="img/avatar.PNG"/><br/>
                                  {{ $user->firstname }} 
                          </div>
                            @endif
                           @endforeach 
                          <!--  dont remove -->
                          <div style="clear: both;"></div>

                </div>
<div class="view_this_project_tags">
                @foreach($value->category as $category)
                  <span>#{{$category->title}}</span>
                @endforeach
</div>
<div class="this_project_description"></div>
<div class="view_this_project_description">
{{ Markdown::parse($project->body) }}
    </div>
                </div>
            @endforeach
      </div>


@stop
