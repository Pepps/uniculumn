<!-- app/views/projects/create.blade.php -->
@extends('layouts.master')

@section('content')
<div class="container">

@include('layouts.nav')
@yield('nav')

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
        {{ Form::label('postnumber', "Postnummer" ) }}
        {{ Form::text('postnumber', $user->postnumber, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('phone', "Telefonnummer" ) }}
        {{ Form::text('phone', $user->phone, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('address', "Adress" ) }}
        {{ Form::text('address', $user->address, array('class' => 'form-control')) }}
    </div>

    <select class="form-control" id="state-select">
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

    <div class="form-group">
        {{ Form::label('user_title', "Ort" ) }}
        {{ Form::select('city', array('0' => 'Välj din stad'), Input::old('state'), array('class' => 'form-control', 'id' => 'cities')) }}
    </div>

    @if(!$nocity)
      <span id="hidden_city" style="display:none;">{{$user->city_id}}</span>
    @endif

    <div class="form-group">
        {{ Form::label('description', "Beskrivning" ) }}
        {{ Form::textarea('description', $user->description, array('class' => 'form-control')) }}
    </div>
    {{ Form::submit('Updatera din profil', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
</div>

<script>
//Ajax script that gets cities from the DB depending on the state you select.

window.onload = function() {
    get($('#state-select').val());
    $("#state-select").on("change", function() {
        value = $(this).val();
        get(value);
  });
}

function get(value) {
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "/state/"+value,
    }).done(function(data) {
      $("#cities").empty();
      for(var i = 0; i < data.length; i++) {
        if (data[i].id == Number($('#hidden_city').text())) {
           $("#cities").append("<option value='"+data[i].id+"'selected>"+data[i].name+"</option>");
        }
        else {
           $("#cities").append("<option value='"+data[i].id+"''>"+data[i].name+"</option>");
        }
    }
    });
}
</script>

@stop
