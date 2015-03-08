<!-- app/views/experience/create.blade.php -->
@extends('layouts.master')

@section('content')
<div class="container">
@include('project.projectnav')
@yield('projectnav')

<h1>Add references</h1>
<!-- If there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => '/experience/{id}/addref/', 'method'=>'post')) }}
<div class="form-group">
    {{ Form::label('company', 'Company') }}
    {{ Form::text('company', Input::old('name'), array('class' => 'form-control')) }}
    {{ Form::label('states', 'State') }}
    <select class="form-control" id="state-select">
      @foreach ($states as $state)
        <option value="{{ $state->id }}">{{$state->name}}</option>
      @endforeach
    </select>

    {{ Form::label('cities', 'City') }}
    {{ Form::select('cities', array('0' => 'Select a city'), Input::old('cities'), array('class' => 'form-control', 'id' => 'cities')) }}
    {{ Form::label('firstname', 'First name') }}
    {{ Form::text('firstname', Input::old('name'), array('class' => 'form-control')) }}
    {{ Form::label('lastname', 'Last name') }}
    {{ Form::text('lastname', Input::old('name'), array('class' => 'form-control')) }}
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', Input::old('name'), array('class' => 'form-control')) }}
    {{ Form::label('phone', 'Phone') }}
    {{ Form::text('phone', Input::old('name'), array('class' => 'form-control')) }}
</div>


    {{ Form::submit('Add experience', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}


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
</div>
@stop
