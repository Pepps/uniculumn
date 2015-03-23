<!-- app/views/experience/create.blade.php -->
@extends('layouts.master')

@section('content')

@include('layouts.nav')
@yield('nav')
<div id="main_content">

<h1>Lägg till erfarenheter</h1>

<!-- If there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'experience', 'method'=>'post')) }}


    <div class="form-group">
        {{ Form::label('title', 'Titel') }}
        {{ Form::text('title', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('location', 'Location') }}
        {{ Form::text('location', Input::old('name'), array('class' => 'form-control')) }}
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
    <br>

    <div class="form-group">
    {{ Form::label('category', 'Category') }}
    {{ Form::select('category', array('0' => 'Select a category'), Input::old('category'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group" id="subcategory-form">
    </div>

    <!---
     HIDDEN FORMS
    -->

    {{ Form::text('subcategory_id', Input::old('category'), array('class' => 'hidden', 'id' => 'subcategory_id')) }}

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

function show(id) {
    $.ajax({
        type    : "GET",
        url     : "/category/show/"+id,
        success : function(data) {
            data = jQuery.parseJSON(data);
            if (id==0) {
                $('#category').html("");
                for (var i=0; i<data.length; i++) {
                    $('<option value="'+data[i]['id']+'">'+data[i]['title']+'</option>').appendTo($('#category'));
                    }
                }
                else {
                    $('#subcategory-form').html("");
                    var x = 0;
                    for (var i=0; i<data.length; i++) {
                            $('<div class="checkbox"><input type="checkbox" class="sub-checkbox" name="subcategory" value="'+data[i]['id']+'"/>'+data[i]['title']+"</div>").appendTo($(' #subcategory-form') );
                        }
                    }

            $(".sub-checkbox").on("change", function(){
                if (jQuery.inArray($(this).val(), subcategories) == -1) {
                    subcategories.push($(this).val());
                }
                else {
                    subcategories.splice(jQuery.inArray($(this).val(), subcategories),1);
                }
                $('#subcategory_id').val("");
                $('#subcategory_id').val(subcategories.toString().replace(new RegExp(",","g"), "-"));
            });
        }
    }, "json");

    return false;
}

$(document).on('change', '#category', function(e) {
    e.preventDefault(e);

        //-----
        // TODO comments here
        //-----

    show($("#category").val());


});

</script>
@stop
