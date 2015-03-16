
@section('nav')

<div id="ui_sidebar">
            <a href="/user">{{ HTML::image('img/logoleft.PNG', 'a picture', array('class' => 'left_logo')) }}</a>
            <a href="/doc" ><h2><div class="arrow-right"></div>Avancerad sökning</h2></a>
            <a href="/user" ><h2><div class="arrow-right"></div>Min profil</h2></a>
            <a href="/project" ><h2><div class="arrow-right"></div>Mina projekt</h2></a>
            <a href="/experience" ><h2><div class="arrow-right"></div>Mina erfarenheter</h2></a>
        </div>

        <div id="ui_header">

            <div class="user_box">

                <a href="/user">{{ HTML::image('img/snape.PNG','user picture', array('class' => 'user_picture')) }}</a>

                <div class="username_holder">
                    <span class="user_name">{{$user->firstname}}</span>

                    <div class="arrow-down" id="clickmetoo">
                      <div class="settings">
                          Kontoinställningar<br/>
                          <a href="/logout">Logga ut</a>
                          <div class="arrow-up" id="hide_controlpanel"></div>

                      </div>
                    </div>
                </div>

            </div>
          <div class="upload_shortcut">
              <h2 class="cursor">» Ladda upp ett nytt projekt</h2>
              <a href="/project/create">{{ HTML::image('img/upload_button.PNG', '', array('id' => 'upload_button')) }}</a>
          </div>
      </div>

@stop
