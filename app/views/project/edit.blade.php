<!-- app/views/projects/edit.blade.php -->
@extends('layouts.master')


@section('content')

@include('layouts.nav')
@yield('nav')

{{ HTML::ul($errors->all()) }}

      <div id="main_content">

      <h1>{{ HTML::image('img/edit.PNG', 'a picture', array('class' => 'cloud')) }}Redigera</h1>
      {{ Form::open(array('url' => 'project', 'files'=>true, 'method'=>'post')) }}

      @if ( $project->user_id == Auth::user()->id)
        {{ Form::open(array('url' => 'project/addcolab/'.$project->id)) }}
          <div class="form-group" id="bloodhound">
              {{ Form::label('collaborators-form', 'Medarbetare') }}
              {{ Form::text('collaborators-form', Input::old('name'), array('class' => 'typeahead uploadfile', 'id' => 'input-collaborators')) }}
              {{ Form::submit('Update the project!', array('class' => 'submit_project')) }}
          </div>
        {{ Form::close() }}
        <h3>
      @foreach ($users as $user)
        @if($user->id != Auth::user()->id)
          <span class="label label-info">{{$user->email}} <a href="/project/delcolab/{{$project->id}}/{{$user->id}}" style="color: #fff;"><i class="fa fa-times"></i></a></span>
        @endif
      @endforeach
      </h3>
    @endif

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
            <div class="media_icon">{{ HTML::image('img/icons/blue/game.PNG') }}Spel</div>
            <div class="media_icon">{{ HTML::image('img/icons/blue/music.PNG') }}Ljud</div>
            <div class="media_icon">{{ HTML::image('img/icons/blue/video.PNG') }}Video</div>
            <div class="media_icon">{{ HTML::image('img/icons/blue/essay.PNG') }}Text</div>
          </div>


          <div class="upload_column">
            <div class="dark_icon categories_icon"><div class="check_category"></div></div>
             <h3>Välj kategori</h3>
           <select name="category" class="uploadfile" id="project_category">
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
             {{ Form::file('files[]', array('multiple'=>true, "class" => 'uploadfile')) }}
          </div>
          <br/><br/><br/>
          <input type="submit" class="submit_project" value="Skapa projekt">
          <div style="clear: both;"></div>
        </div>

        {{ Form::text('subcategory_id', Input::old('category'), array('class' => 'hidden', 'id' => 'subcategory_id')) }}

    <div class="alert alert-info" role="alert" style="text-align: center;"><b>Om du vill lade upp ett störe arbete så rekomderar vi att du gör en Zip fil av det och laddar up den.</b></div>

    <br>
        {{ Form::close() }}

    @stop

@stop
