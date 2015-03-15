<!-- app/views/projects/edit.blade.php -->
@extends('layouts.master')


@section('content')

@include('layouts.nav')
@yield('nav')

<div id="main_content">
  <div id="my_projects">
      <h1>Mina projekt</h1>

      @foreach ($project as $value)
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
                      <div class="ex_float hide_this exp_location">Potatis{{ HTML::image('img/icons/edit/categories.PNG') }}</div>
                      <div class="ex_float hide_this">2007/03/23 {{ HTML::image('img/icons/edit/clock.PNG') }}</div>
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

                   <!-- <Kontrollknappar>  -->
                        <div class="ex_button" style="background-color: #d70808;">{{ HTML::image('img/icons/edit/delete.PNG') }}</div>
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
                <h2 class="hide_this"><a href="">Snape, Snape!</a></h2>
             <!-- </Titel>  -->

             <!-- <Redigera titel>  -->
                <input value="Snape, Snape!" class="edit_this"></input>
             <!-- </Redigera titel>  -->

             <div class="ex_description">
             <!-- <Beskrivning>  -->
               <span class="hide_this">Snape, Snape, Severus Snape, Snape, Snape, Severus Snape... Dumbledore!</span>

             <!-- </Beskrivning>  -->

             <!-- <Redigera beskrivning>  -->
                <textarea class="edit_this" rows="6">Snape, Snape, Severus Snape, Snape, Snape, Severus Snape... Dumbledore!</textarea>
             <!-- </Redigera beskrivning>  -->
             </div>

          <!-- <Lägg till ny referens>  -->
            <div class="references_choices">

                <div class="ref_column">

                  <h3> Förnamn</h3>
                  <input class="references_input" id="first_name"></input>

                  <h3>Efternamn</h3>
                  <input class="references_input" id="last_name"></input>

                </div>

                 <div class="ref_column">

                    <h3>Email </h3>
                    <input class="references_input" id="email_address"></input>

                    <h3>Telefon </h3>
                    <input class="references_input" id="phone_number"></input>
                    <br/>

                  <div class="addreference">
                     Klar
                  </div>
                  <div class="clearreference">
                      Ta bort
                  </div>
                </div>
              </div>

             <!-- </Lägg till ny referens>  -->



             <!-- <Referenser>  -->
            <div class="show_references">
            {{ HTML::image('img/small_menu.PNG') }} Visa projektmedlemmar  <div class="show_tags">{{ HTML::image('img/hashtag.PNG') }} Visa taggar</div><br/>

              <div class="allreferences">

                <div class="project_members_square">
                  @foreach ($users as $u)
                        <div class="delete_member">{{ HTML::image('img/icons/edit/delete.PNG') }}</div>
                    {{ $u->firstname }}
                  @endforeach
                </div>

              </div>

              <div class="alltags">

                 <span >#musik</span> <span>#beat</span> <span>#acapella</span>  <span>#teamwork</span>
                      <span>#magi</span> <span>#chips</span>

              </div>


            </div>
          </div>
        @endforeach

@stop
