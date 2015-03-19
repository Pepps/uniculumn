@extends('layouts.master')

@include('layouts.nav')
@yield('nav')

@section('content')

        <div id="main_content">
          <div class="projet_plane" style="background-color:#2F4342;">
            <div class"category_plane" style="background-color:#5DC8B9;">
              <div class="s_categories_dark">

            <div class="chosen_categories">
                  @foreach ($categories as $value)
                    <span class="label label-default">{{ $value->title }}</span>
                  @endforeach<!--
              <table>
                <tr>
                  <td class="td_category"><div class="category_view">Kategori_1</div></td>
                  <td class="td_category"><div class="category_view">Kategori_2</div></td>
                  <td class="td_category"><div class="category_view">Kategori_3</div></td>
               </tr>
              </table>
 -->
            </div>

            </div>

            </div>
            <div class="title">
            </div>

            <div class="time_stamp">2015-03-13</div>
            <div class="text_description">{{ Markdown::parse($project->body) }}
            </div>


        </div>

          <div class="file_folder" style="background-color:#2F4342;">
          <div class="file_plane" style="background-color:#5DC8B9;">
          <div class="s_folder_dark">
            <div class="file_title">
              Test
            </div>
            </div>
            </div>
            <div class="file_order">
              TEst
            </div>



      </div>
      </div>

@stop
