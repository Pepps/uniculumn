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
  <div class="file_list file_image">dumbledore_nudes.JPG</div>
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
                              <img src="img/albus.PNG"/><br/>
                            {{ User::find($value->owner_id)->firstname}}
                          </div>
                          <!--  dont remove -->
                          <div style="clear: both;"></div>

                </div>
<div class="view_this_project_tags">
    <span class="master_category">Musik</span> 
    <span>#music</span> 
    <span>#friends</span> 
    <span>#voldyanddumby</span> 
    <span>#fuckthatpotterkid</span> 
    <span>#voldyanddumby</span> 
    <span>#voldyanddumby</span> 
    <span>#voldyanddumby</span> 
    <span>#voldyanddumby</span> 
</div>
<div class="this_project_description"></div>
<div class="view_this_project_description">
{{ Markdown::parse($project->body) }}
    </div>
                </div>
            @endforeach
      </div>
@stop
