<!-- app/views/projects/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Uniculum</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    {{ HTML::script('javascript/jquery-2.1.3.min.js') }}
    {{ HTML::script('javascript/ajax.js') }}
    <style type="text/css">
    /*Jesper Css*/
        .checkbox {
            float:left;
            width: 20%;
            height:50px;
            margin:0 !important;
        }
        #subcategory-form {
            height:200px;
        }
    </style>
</head>
<body>
<div class="container">

@include('project.projectnav')
@yield('projectnav')

<h1>Registrera Projekt</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'project')) }}

    <div class="form-group">
        {{ Form::label('project_title', 'Titel') }}
        {{ Form::text('project_title', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('project_body', 'Beskrivning') }}
        {{ Form::textarea('project_body', Input::old('project_body'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('category', 'Kategori') }}
        {{ Form::select('category', array('0' => 'Select a project Type', '1' => 'Hemligt bajs', '2' => 'Ekonomi'), Input::old('category'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group" id="subcategory-form">
    </div>
    <!---
    / HIDDEN FORMS
    -->

    {{ Form::text('subcategory_id', Input::old('category'), array('class' => 'hidden', 'id' => 'subcategory_id')) }}

    {{ Form::submit('Create the project!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
