<!-- app/views/projects/create.blade.php -->
@extends('layouts.master')

@section('content')


      <div id="bottom"></div>
        <div id="ui_sidebar">

            <img src="img/logoleft.PNG" class="left_logo"/>
            <h2><div class="arrow-right"></div>Avancerad sökning</h2>
            <h2><div class="arrow-right"></div>Min profil</h2>
            <h2><div class="arrow-right"></div>Mina projekt</h2>
            <h2><div class="arrow-right"></div>Mina erfarenheter</h2>
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

      <h1><img src="img/cloud.PNG" class="cloud"/>Ladda upp nytt projekt</h1>
      {{ Form::open(array('url' => 'project', 'files'=>true, 'method'=>'post')) }}

          <div class="upload_column">
            <div class="dark_icon title_icon"><div class="check_title"></div></div>
             <h3>Välj titel</h3>
            <input class="uploadfile" name="project_title" id="project_title" value=""> </input>
          </div>



          <div class="upload_column">
            <div class="dark_icon description_icon"><div class="check_description"></div> </div>
             <h3>Beskriv ditt projekt</h3>
            <textarea class="uploadfile" name="project_body" id="project_description" rows="4" cols="50"></textarea>
          </div>

          <div class="upload_column mediatype" style="display: none;">
           <div class="dark_icon mediatype_icon"><div class="check_mediatype"></div></div>
            <h3>Välj mediatyp</h3>
            <div class="media_icon"><img src="img/icons/blue/game.PNG"/>Spel</div>
            <div class="media_icon"><img src="img/icons/blue/music.PNG"/>Ljud</div>
            <div class="media_icon"><img src="img/icons/blue/video.PNG"/>Video</div>
            <div class="media_icon"><img src="img/icons/blue/essay.PNG"/>Text</div>
          </div>


          <div class="upload_column">
            <div class="dark_icon categories_icon"><div class="check_category"></div></div>

             <h3>Välj kategori</h3>
           <select class="uploadfile" id="project_category">
            <option value="none">-----</option>
          </select>

            <div class="subcategories">
            <div class="check_subcategories" id="subcategory-form"></div>
            <div class="subcheckbox"><input type="checkbox" name="dumbledore" value="lily"><label for="lily"><span><span></span></span>>-----<</label></div>
            </div>


          </div>

          <div class="upload_column">
            <div class="dark_icon upload_icon"> </div>
             <h3>Ladda upp fil</h3>
            <input class="uploadfile"> </input>
          </div>
          <br/><br/><br/>
          <input type="submit" class="submit_project" value="Skapa projekt">

          <div style="clear: both;"></div>
        </div>

        {{ Form::text('subcategory_id', Input::old('category'), array('class' => 'hidden', 'id' => 'subcategory_id')) }}
        {{ Form::text('collaborators_id', Input::old('collaborators'), array('class' => 'hidden', 'id' => 'collaborators_id')) }}

        {{ Form::close() }}

    @stop
