<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Uniculum - Sök</title>
    <link rel="shortcut icon" href="img/favicon.ico" />
    @extends('layouts.master')
    </head>
      <body>

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
          <div class="projet_plane" style="background-color:#2F4342;">
            <div class"category_plane" style="background-color:#5DC8B9;">
              <div class="s_categories_dark">

            <div class="chosen_categories">
              <!-- all the categorys the project include-->
              <table>
                <tr>
                  <td class="td_category"><div class="category_view">Kategori_1</div></td>
                  <td class="td_category"><div class="category_view">Kategori_2</div></td>
                  <td class="td_category"><div class="category_view">Kategori_3</div></td>
               </tr>
              </table>

            </div>

            </div>

            </div>
            <!-- title on the project -->
            <div class="title">Fisk</div>
            <!-- the text of your project -->
            <div class="text_description">
              lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem  lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum
            </div>
            <!--Timestamp-->
            <div class="time_stamp">2015-03-13</div>
            

        </div>

          <div class="file_folder" style="background-color:#2F4342;">
          <div class="file_plane" style="background-color:#5DC8B9;">
          <div class="s_folder_dark">
            <div class="file_title">
              <p>Filer</p>
            </div>
            </div>
            </div>
            <!--Here you will be able to add files that will show in the browser-->
            <div class="file_order">
              s
            </div>
          
        

      </div>
      </div>




      </body>      
</html>