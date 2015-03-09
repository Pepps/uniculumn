<!-- app/views/projects/create.blade.php -->
@extends('layouts.master')

@section('content')
<div class="container">

@include('project.projectnav')
@yield('projectnav')

<h1>Updatera Din Profil</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'user/update/'.$user->id)) }}

    <div class="form-group">
        {{ Form::label('firstname', "Användarnamn" ) }}
        {{ Form::text('firstname', $user->firstname, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('lastname', "Efternamn" ) }}
        {{ Form::text('lastname', $user->lastname, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', "Email" ) }}
        {{ Form::text('email', $user->email, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('address', "Adress" ) }}
        {{ Form::text('address', $user->address, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('user_title', "Postnummer" ) }}
        {{ Form::text('postnumber', $user->postnumber, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('user_title', "Telefonnummer" ) }}
        {{ Form::text('phone', $user->phone, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('user_title', "Län" ) }}
        {{ Form::select('state', array('0' => 'Välj ditt län'), Input::old('state'), array('class' => 'form-control', 'id' => 'state')) }}
    </div>

    <div class="form-group">
        {{ Form::label('user_title', "Ort" ) }}
        {{ Form::select('city', array('0' => 'Välj din stad'), Input::old('state'), array('class' => 'form-control', 'id' => 'city')) }}
    </div>

    {{ Form::submit('Updatera din profil', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>

<script>
//Ajax script that gets cities from the DB depending on the state you select.
window.onload = function() {
  $("#state-select").on("change", function() {
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "/state/"+$(this).val(),
    }).done(function(data) {
      $("#cities").empty();
      for(var i = 0; i < data.length; i++) {
       $("#cities").append("<option>"+data[i].name+"</option>");

     }

     // console.log(data[5].name);
    });
  });
}

</script>

@stop
