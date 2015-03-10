<!-- app/views/experience/create.blade.php -->
@extends('layouts.master')

@section('content')
<div class="container">
@include('project.projectnav')
@yield('projectnav')


<h1>Lägg till erfarenheter</h1>

<!-- If there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'experience', 'method'=>'post')) }}


    <div class="form-group">
        {{ Form::label('title', 'Titel') }}
        {{ Form::text('title', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('type', 'Jobb:') }}
        {{ Form::radio('type', 1, false, ['class' => 'jobb']) }}
        <br>
        {{ Form::label('type', 'Utbildning:') }}
        {{ Form::radio('type', 0, false, ['class' => 'utbildning']) }}
        <br>
        {{ Form::label('type', 'Merit:') }}
        {{ Form::radio('type', 2, false, ['class' => 'merit']) }}
        <br>
        {{ Form::label('type', 'Övrigt:') }}
        {{ Form::radio('type', 3, false, ['class' => 'ovrigt']) }}
    </div>

    <div class="form-group">
    {{ Form::label('states', 'State') }}
    <select class="form-control" id="state-select">
      @foreach ($states as $state)
        <option value="{{ $state->id }}">{{$state->name}}</option>
      @endforeach
    </select>
    {{ Form::label('cities', 'City') }}
    {{ Form::select('cities', array('0' => 'Select a city'), Input::old('cities'), array('class' => 'form-control', 'id' => 'cities')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
    	<div class="col-xs-2">
        {{ Form::label('from', 'From') }}
        {{ Form::text('from', Input::old('name'), array('class' => 'form-control')) }}
        {{ Form::label('to', 'To') }}
        {{ Form::text('to', Input::old('name'), array('class' => 'form-control')) }}
    	</div>
	</div>
    <br>

    	{{ Form::submit('Add experience', array('class' => 'btn btn-primary')) }}
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
       $("#cities").append("<option value='"+data[i].id+"'>"+data[i].name+"</option>");

     }

     // console.log(data[5].name);
    });
  });
}

</script>
@stop
