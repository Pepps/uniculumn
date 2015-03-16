<!-- app/views/projects/edit.blade.php -->
@extends('layouts.master')


@section('content')

@include('layouts.nav')
@yield('nav')

<div id="main_content">
  <div id="my_projects">
      <h1>Mina projekt</h1>

      @foreach ($projects as $value)
      <div class="ex_column">
    <div class="edit_tags_block"/>
        <div class="tag_boxes"><input type="checkbox" name="dumbledore" value="lily"><label for="lily"><span><span></span></span>Pommes </label></div>
        <div class="tag_boxes"><input type="checkbox" name="dumbledore" value="lily"><label for="lily"><span><span></span></span>Kokt</label></div>
        <div class="tag_boxes"><input type="checkbox" name="dumbledore" value="lily"><label for="lily"><span><span></span></span>Chips</label></div>
        <div class="tag_boxes"><input type="checkbox" name="dumbledore" value="lily"><label for="lily"><span><span></span></span>Pommes </label></div>
        <div class="tag_boxes"><input type="checkbox" name="dumbledore" value="lily"><label for="lily"><span><span></span></span>Kokt</label></div>
     </div>
            <div class="ex ico_audio">
              Ljud
            </div>

              <div class="edit_wrapper project_list">

                   <!-- <Kategori/created at>  -->
                      <div class="ex_float hide_this exp_location">{{ HTML::image('img/icons/edit/categories.PNG') }}</div>
                      <div class="ex_float hide_this">{{str_limit($value->created_at, $limit = 10, $end = '')}} {{ HTML::image('img/icons/edit/clock.PNG') }}</div>
                   <!-- </Plats/tid>  -->

                   <!-- <Redigera kategori>  -->
                       <div class="ex_float edit_this">
                        <select>
                              <option value="none">Kategori</option>
                              <option value="volvo">Potatis</option>
                              <option value="saab">Fläsksallad</option>
                              <option value="mercedes">Grötrullar</option>
                              <option value="audi">Bananlåda</option>
                            </select>

                       <div class="edit_tags edit_this">{{ HTML::image('img/hashtag.PNG') }}
                          Ändra taggar

                       </div>
                       </div>

                  <!-- </Redigera plats/tid>  -->
                        <span class="proj_id" style="display:none;">{{$value->id}}</span>
                   <!-- <Kontrollknappar>  -->
                        <div class="ex_button delete_btn" style="background-color: #d70808;">{{ HTML::image('img/icons/edit/delete.PNG') }}</div>
                        <div class="ex_button edit_experience">{{ HTML::image('img/icons/edit/edit.PNG') }}</div>
                        <div class="ex_button edit_references">{{ HTML::image('img/icons/edit/add.PNG') }}</div>
                        <div class="ex_button">{{ HTML::image('img/icons/edit/search.PNG') }}</div>

                          <!-- <Spara ändringar>  -->
                <div class="add_ref_edit edit_this">
                Spara ändringar
                </div>
                <div class="ignore_ref_edit edit_this">
                Ångra
                </div>
             <!-- </Spara ändringar>  -->
                   <!-- </Kontrollknappar>  -->

              </div>


             <!-- <Titel>  -->
                <h2 class="hide_this">{{ $value->title }}</h2>
             <!-- </Titel>  -->

             <!-- <Redigera titel>  -->
                <input value="Snape, Snape!" class="edit_this"></input>
             <!-- </Redigera titel>  -->

             <div class="ex_description">
             <!-- <Beskrivning>  -->
               <span class="hide_this">{{$value->body}}</span>

             <!-- </Beskrivning>  -->

             <!-- <Redigera beskrivning>  -->
                <textarea class="edit_this" rows="6">Snape, Snape, Severus Snape, Snape, Snape, Severus Snape... Dumbledore!</textarea>
             <!-- </Redigera beskrivning>  -->
             </div>

          <!-- <Lägg till projektmedlemmar>  -->
            <div class="references_choices">

                <div class="ref_column">

                  <h2> Lägg till projektmedlemmar</h2>


                  <h3>Sök</h3><input class="references_input" id="last_name"></input>

                  <div class="add_selected_member">Lägg till</div>
                </div>

                 <div class="ref_column">
                <div class="added_members">
                <span>etafemtioj@gmail.com <img class="delete_added_member" src="img/delete_button.PNG"/></span>
                <span>etttvåtretusenhundrafemtioj@gmail.com <img class="delete_added_member" src="img/delete_button.PNG"/></span>
                <span>ettj@gmail.com <img class="delete_added_member" src="img/delete_button.PNG"/></span>
                </div>


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
                  <div class='project_members_square'>
                    <div class='delete_member'>{{ HTML::image('img/icons/edit/delete.PNG') }}</div>
                    <span class='label label-info'>{{$user->email}}</span>
                    {{ HTML::image('img/avatar.PNG') }}
                  </div>
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
