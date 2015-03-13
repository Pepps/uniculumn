<!-- app/views/projects/edit.blade.php -->
@extends('layouts.master')


@section('content')

@include('layouts.nav')
@yield('nav')

      <div id="bottom"></div>
        <div id="ui_sidebar">

            <img src="img/logoleft.PNG" class="left_logo"/>
            <h2><div class="arrow-right"></div><a href="search.html">Avancerad sökning</a></h2>
            <h2><div class="arrow-right"></div><a href="user_profile.html">Min profil</a></h2>
            <h2><div class="arrow-right"></div><a href="upload_file.html">Mina projekt</a></h2>
            <h2><div class="arrow-right"></div><a href="erfarenheter.html">Mina erfarenheter</a></h2>
        </div>

        <div id="ui_header">

            <div class="user_box">

                <div class="user_picture">
                </div>

                <div class="username_holder">
                    <span class="user_name">Severus Snape</span>

                    <div class="arrow-down" id="clickmetoo">
                      <div class="settings">
                          Kontoinställningar<br/>
                          Logga ut
                          <div class="arrow-up" id="hide_controlpanel"></div>

                      </div>
                    </div>
                </div>

            </div>

          <div class="upload_shortcut">
              <h2 class="cursor">» Ladda upp ett nytt projekt</h2>
              <img src="img/upload_button.PNG" id="upload_button" />
          </div>

      </div>

      <div id="main_content">
<div id="my_projects">
      <h1>Mina projekt</h1>

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
                      <div class="ex_float hide_this exp_location">Potatis<img src="img/icons/edit/categories.PNG"/></div>
                      <div class="ex_float hide_this">2007/03/23 <img src="img/icons/edit/clock.PNG"/></div>
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

                       <div class="edit_tags edit_this">
                         <img src="img/hashtag.PNG"/> Ändra taggar

                       </div>
                       </div>

                  <!-- </Redigera plats/tid>  -->

                   <!-- <Kontrollknappar>  -->
                        <div class="ex_button" style="background-color: #d70808;"><img src="img/icons/edit/delete.PNG"/></div>
                        <div class="ex_button edit_experience"><img src="img/icons/edit/edit.PNG"/></div>
                        <div class="ex_button edit_references"><img src="img/icons/edit/add.PNG"/></div>
                        <div class="ex_button"><img src="img/icons/edit/search.PNG"/></div>

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
            <img src="img/small_menu.PNG"/> Visa projektmedlemmar  <div class="show_tags"><img src="img/hashtag.PNG"/> Visa taggar</div><br/>

              <div class="allreferences">

                <div class="project_members_square">
                        <div class="delete_member"><img src="img/icons/edit/delete.PNG"/></div>
                    <img src="img/albus.PNG"/><br/>
                    Albus
                </div>

                <div class="project_members_square">
                        <div class="delete_member"><img src="img/icons/edit/delete.PNG"/></div>
                    <img src="img/ron.PNG"/><br/>
                    Ron
                </div>
                <div class="project_members_square">
                        <div class="delete_member"><img src="img/icons/edit/delete.PNG"/></div>
                    <img src="img/harry.PNG"/><br/>
                    Harry
                </div>

                <div class="project_members_square">
                        <div class="delete_member"><img src="img/icons/edit/delete.PNG"/></div>
                    <img src="img/voldy.PNG"/><br/>
                    Voldemort
                </div>

                <div class="project_members_square">
                        <div class="delete_member"><img src="img/icons/edit/delete.PNG"/></div>
                    <img src="img/hermione.PNG"/><br/>
                    Hermione
                </div>

              </div>

              <div class="alltags">

                 <span >#musik</span> <span>#beat</span> <span>#acapella</span>  <span>#teamwork</span>
                      <span>#magi</span> <span>#chips</span>

              </div>


            </div>
          </div>

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
                      <div class="ex_float hide_this exp_location">Potatis<img src="img/icons/edit/categories.PNG"/></div>
                      <div class="ex_float hide_this">2007/03/23 <img src="img/icons/edit/clock.PNG"/></div>
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

                       <div class="edit_tags edit_this">
                         <img src="img/hashtag.PNG"/> Ändra taggar

                       </div>
                       </div>

                  <!-- </Redigera plats/tid>  -->

                   <!-- <Kontrollknappar>  -->
                        <div class="ex_button" style="background-color: #d70808;"><img src="img/icons/edit/delete.PNG"/></div>
                        <div class="ex_button edit_experience"><img src="img/icons/edit/edit.PNG"/></div>
                        <div class="ex_button edit_references"><img src="img/icons/edit/add.PNG"/></div>
                        <div class="ex_button"><img src="img/icons/edit/search.PNG"/></div>

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
            <img src="img/small_menu.PNG"/> Visa projektmedlemmar  <div class="show_tags"><img src="img/hashtag.PNG"/> Visa taggar</div><br/>

              <div class="allreferences">

                <div class="project_members_square">
                        <div class="delete_member"><img src="img/icons/edit/delete.PNG"/></div>
                    <img src="img/albus.PNG"/><br/>
                    Albus
                </div>

                <div class="project_members_square">
                        <div class="delete_member"><img src="img/icons/edit/delete.PNG"/></div>
                    <img src="img/ron.PNG"/><br/>
                    Ron
                </div>
                <div class="project_members_square">
                        <div class="delete_member"><img src="img/icons/edit/delete.PNG"/></div>
                    <img src="img/harry.PNG"/><br/>
                    Harry
                </div>

                <div class="project_members_square">
                        <div class="delete_member"><img src="img/icons/edit/delete.PNG"/></div>
                    <img src="img/voldy.PNG"/><br/>
                    Voldemort
                </div>

                <div class="project_members_square">
                        <div class="delete_member"><img src="img/icons/edit/delete.PNG"/></div>
                    <img src="img/hermione.PNG"/><br/>
                    Hermione
                </div>

              </div>

              <div class="alltags">

                 <span >#musik</span> <span>#beat</span> <span>#acapella</span>  <span>#teamwork</span>
                      <span>#magi</span> <span>#chips</span>

              </div>


            </div>
          </div>

@stop
