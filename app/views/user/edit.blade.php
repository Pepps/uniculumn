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
                        @if($state->id == City::find($user->city_id)->state_id)
                          <option value="{{ $state->id }}" selected >{{$state->name}}</option>
                        @else
                          <option value="{{ $state->id }}">{{$state->name}}</option>
                        @endif
                      @else
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


        {{ Form::open(array('url' => 'user/update_password/'.$user->id)) }}
         <div class="account_column ">
            <h2>Ändra lösenord </h2>

          <div class="change_password">
            <div class="password_column">
            Gammalt lösenord
            {{ Form::text('old_password','', array('class' => 'password_column')) }}
            </div>
              <div class="password_column">
            {{ Form::text('new_password','', array('class' => 'password_column')) }}
              <br/>
              <br/>
            {{ Form::text('new_password_confirm','', array('class' => 'password_column')) }}
              </div>
            </div>
           </div>
            <input type="submit" class="blue_submit save_password_changes" value="Spara ändringar"></input>
            <input type="submit" class="dark_submit save_password_changes" value="Avbryt"></input>

          </div>
      </div>
      {{ Form::close() }}

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


        {{ Form::open(array('url' => 'user/update_description/'.$user->id)) }}
          <h2>Ändra presentation</h2>
          {{ Form::textarea('description', $user->description, array('class' => 'form-control')) }}
            <input type="submit" class="blue_submit" value="Ladda upp"></input>
            <input type="submit" class="dark_submit" value="Bläddra"></input>
            <br/><br /><br /><br />
        {{ Form::close() }}

      {{ Form::open(array('url' => 'user/update_interest/'.$user->id)) }}
      <div class="account_column"  style="padding-left: 3vw;">
             <div class="dark_icon user_interests"> </div><h3>Lägg till intressen</h3>
              <?php $categories = Category::all(); ?>
              <select class="uploadfile" id="categories-select">
                     @foreach($categories as $category)
                      @if ($category->subcategory_id == 0)
                        <option value="{{ $category->id }}" >{{ $category->title }}</option>
                      @endif
                    @endforeach
              </select>
              <br/>
              <br/>
              {{ Form::select('subcategories', array('0' => 'Välj din Kategori'), Input::old('subcategories_id'), array('class' => 'uploadfile', 'id' => 'subcategories')) }}
              <br/>
            <input type="submit" class="blue_submit" value="Lägg till"></input>
            <br/><br /><br /><br />
      {{ Form::close() }}
          </div>
      <div class="upload_interests">
       <br /><br />
            <input type="submit" class="blue_submit" value="Ladda upp"></input>
            <input type="submit" class="dark_submit" value="Bläddra"></input>
       </div>
  </div>




@stop
