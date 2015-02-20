<!-- app/views/projects/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Uniculum</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    {{ HTML::script('javascript/jquery-2.1.3.min.js') }}
    {{ HTML::script('javascript/ajax.js') }}
    <style type="text/css">
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

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('Project') }}">Project Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('projects') }}">View All Projects</a></li>
        <li><a href="{{ URL::to('project/create') }}">Create a Project</a>
    </ul>
</nav>

<h1>Registrera Projekt</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'Project')) }}

    <div class="form-group">
        {{ Form::label('name', 'Namn') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('subname', 'Beskrivning') }}
        {{ Form::textarea('subname', Input::old('subname'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('project-type', 'Project Type') }}
        {{ Form::select('project-type', array('0' => 'Select a Project Type', '1' => 'Mediateknik', '2' => 'Ekonomi'), Input::old('project-type'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group" id="subcategory-form">
    </div>

    <div class="form-group">
        {{ Form::label('user_id', 'Användarnamn') }}
        {{ Form::text('user_id', Input::old('user_id'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Create the Project!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
