<!-- app/views/projects/create.blade.php -->
@extends('layouts.master')

@section('content')

@include('layouts.nav')
@yield('nav')

      <div id="main_content">


      <div id="account_wrapper">
          <h2>Ändra kontoinställningar</h2>
          <div class="account_column">

          <div class="upload_column">
          <div class="current_avatar">
            <img src="img/snape.PNG"/>
          </div>
             <h3>Ladda upp en ny avatar</h3>
            <input class="uploadfile"> </input>
            <input type="submit" class="blue_submit" value="Ladda upp"></input>
            <input type="submit" class="dark_submit" value="Bläddra"></input>
            </div>

        {{ Form::open(array('url' => 'user/update/'.$user->id)) }}

          <div class="account_column">
            <div class="dark_icon user_fullname"> </div><h3>Namn</h3>
              {{ Form::text('firstname', $user->firstname, array('class' => 'uploadfile')) }}
            </div>

          <div class="account_column">
            <div class="dark_icon user_fullname"> </div><h3>Efternamn</h3>
              {{ Form::text('lastname', $user->lastname, array('class' => 'uploadfile')) }}
            </div>

          <div class="account_column">
            <div class="dark_icon user_location"> </div> <h3>Ort</h3>
            <select id="state-select">
                    @foreach ($states as $state)
                      @if(!$nocity)
                    @if ($state->id == $city->state_id)
                      <option value="{{ $state->id }}" selected >{{$state->name}}</option>
                    @endif
                      @else
                    <option value="{{ $state->id }}">{{$state->name}}</option>
                    @endif
                    @endforeach
            </select>
                {{ Form::select('city', array('0' => 'Välj din stad'), Input::old('state'), array('class' => 'form-control', 'id' => 'cities')) }}

                  @if(!$nocity)
                    <span id="hidden_city" style="display:none;">{{$user->city_id}}</span>
                  @endif
          </div>

          <div class="account_column">
             <div class="dark_icon user_phone"> </div><h3>Telefonnummer</h3>
            {{ Form::text('phone', $user->phone, array('class' => 'uploadfile')) }}
          </div>

          <div class="account_column">
             <div class="dark_icon user_email"> </div><h3>Emailaddress</h3>
            <input type="text" class="uploadfile" value="{{ $user->email }}"> </input>
          </div>

            <input type="submit" class="blue_submit" value="Spara ändringar"></input>
            <input type="submit" class="dark_submit" value="Avbryt"></input>

          {{ Form::close() }}
         <div class="account_column ">
            <h2>Ändra lösenord </h2>

          <div class="change_password">
            <div class="password_column">
            Gammalt lösenord
            <input type="text" value=" "> </input>
            </div>
              <div class="password_column">
               Nytt lösenord
              <input type="text" value=" "> </input>
              <br/>
              <br/>
               Nytt lösenord igen
              <input type="text" value=" "> </input>

              </div>
            </div>
           </div>
            <input type="submit" class="blue_submit save_password_changes" value="Spara ändringar"></input>
            <input type="submit" class="dark_submit save_password_changes" value="Avbryt"></input>

          </div>
      </div>

      <div id="profile_wrapper">
        <div id="profile_pic_wrapper">
          <img src="img/profile_picture.PNG"/>
        </div>

        <div class="upload_column" style=" height: 8vw; padding-left: 3vw;">
          <div class="dark_icon upload_icon">
          </div>
             <h3>Ladda upp en ny presentationsbild</h3>
            <input class="uploadfile"> </input>
            <input type="submit" class="blue_submit" value="Ladda upp"></input>
            <input type="submit" class="dark_submit" value="Bläddra"></input>
        </div>

      <h2>Ändra presentation</h2>
          {{ Form::textarea('description', $user->description, array('class' => 'form-control')) }}
            <input type="submit" class="blue_submit" value="Ladda upp"></input>
            <input type="submit" class="dark_submit" value="Bläddra"></input>
            <br/><br /><br /><br />


      <div class="account_column"  style="padding-left: 3vw;">
             <div class="dark_icon user_interests"> </div><h3>Lägg till intressen</h3>
            <input type="text" class="uploadfile" value=""> </input>
            <input type="submit" class="blue_submit" value="Lägg till"></input>
            <br/><br /><br /><br />

          </div>
      <div class="upload_interests">

       <span>#trolldrycker <img src="img/icons/edit/delete.PNG"/></span>
       <span>#maktmissbruk <img src="img/icons/edit/delete.PNG"/></span>
       <span>#lily potter <img src="img/icons/edit/delete.PNG"/></span>
       <span>#svartkonster <img src="img/icons/edit/delete.PNG"/></span>
       <span>#spionage <img src="img/icons/edit/delete.PNG"/></span>
       <span>#hämnd <img src="img/icons/edit/delete.PNG"/></span>
       <br /><br />
            <input type="submit" class="blue_submit" value="Ladda upp"></input>
            <input type="submit" class="dark_submit" value="Bläddra"></input>
       </div>
  </div>




@stop
