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
      



        <!-- Filip vet vad han ska göra med den här, den ska bort och så ska funktionen flyttas till radioknapparna //isa noob -->
        <div style="width: 1vw; height: 1vw; background: red; float: left;" id="clickyes"></div>

        <div class="url_wrapper">
          <img src="img/search.PNG" style="width: 0.7vw; height: 0.7vw; margin-right: 0.5vw;"/> www.randomurl.com/i-barely-understand-this-send-help<br/><br/>
        
          <h2>Dina sökningar:</h2>


          <div class="search_log">

            <!-- hatar tabeller :@@@@ -->
            <table style="width: 20vw; vertical-align: top;">
              <tr>
                <td class="td_category">Kategori</td>
                <td class="td_words">Sökord</td>
                <td class="td_delete">Ta bort</td>
              </tr>
              <tr>
                <td class="td_category"><div class="category_search">Användare</div></td>
                <td class="td_words"><div class="word_search">"I must go, the beard people is calling me"</div></td>
                <td class="td_delete"><img src="img/delete_button.PNG"/></td>
              </tr>
              <tr>
                <td class="td_category"><div class="category_search">Erfarenheter</div></td>
                <td class="td_words"><div class="word_search">Smörgåstårtsätning</div></td>
                <td class="td_delete"><img src="img/delete_button.PNG"/></td>
              </tr>
            </table>

          </div>

          </div>

        <div class="search_wrapper">
          
          <div class="searchbox" id="search_in">
            <div class="search_logo"></div>
              <div class="search_bubble"><div class="bubble_tip"></div> Vad vill du söka i?</div>
        </div>
       
       <div style="clear: both;"></div>

        <div class="choicebox" id="hide_me2">

            <!-- allt detta är en jävla mess, sry -->
           <div class="s_users dark_square"><input class="option" type="radio" name="option" value="user"><label for="user"><span><span></span></span>Användare</label></div>
           <div class="dark_square s_projects"> <input class="option" type="radio" name="option" value="projects"><label for="projects"><span><span></span></span>Projekt</label></div>
           <div class="dark_square s_experiences"><input class="option" type="radio" name="option" value="experiences"><label for="experiences"><span><span></span></span>Erfarenheter</label> </div>
           <div class="dark_square s_categories"> <input class="option" type="radio" name="option" value="categories"><label for="categories"><span><span></span></span>Kategori</label></div>
           <div class="dark_square s_status"> <input class="option" type="radio" name="option" value="status"><label for="status"><span><span></span></span>Status</label></div>
        </div>
  

   <div class="searchbox" id="search_for">
       <div class="search_logo"></div><div class="search_bubble"><div class="bubble_tip"></div> Vad vill du söka efter?</div>
       
        </div>
       <div style="clear: both;"></div>

       <div class="choicebox" id="hide_me">
       <div class="dark_square s_users"><input class="key" type="checkbox" name="field2" value="user"><label for="user22"><span><span></span></span>Användare</label></div>
       <div class="dark_square s_projects"><input class="key" type="checkbox" name="field2" value="project"><label for="projects22"><span><span></span></span>Projekt</label></div>
       <div class="dark_square s_experiences"><input class="key" type="checkbox" name="field2" value="experience"><label for="experiences22"><span><span></span></span>Erfarenheter</label></div>
       <div class="dark_square s_categories"><input class="key" type="checkbox" name="field2" value="categories"><label for="categories22"><span><span></span></span>Kategori</label></div>
       <div class="dark_square s_status"><input class="key" type="checkbox" name="field2" value="status"><label for="status22"><span><span></span></span>Status</label></div>


      <h2>Sök... <input class="input_thing"></div></h2>

        </div>
  
        </div>
        </div>


      </body>      
</html>