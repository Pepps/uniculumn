
<!DOCTYPE html>
<html>
<head>
    <title>Uniculum</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('Project') }}">Project Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('Project') }}">View All Projects</a></li>
        <li><a href="{{ URL::to('Project/create') }}">Create a Project</a>
    </ul>
</nav>

<h1>Edit {{ $project->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($project, array('route' => array('projects.update', $project->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('subname', 'Subname') }}
        {{ Form::text('subname', Input::old('subname'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('project_type', 'Project Type') }}
        {{ Form::select('project_type', array('0' => 'Select a Project Type', '1' => 'Text Document', '2' => '3D-Modeling', '3' => 'Game Creation'), Input::old('project_type'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('user_id', 'Användarnamn') }}
        {{ Form::text('user_id', Input::old('user_id'), array('class' => 'form-control')) }}
    </div>
    {{ Form::submit('Edit the Project!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>