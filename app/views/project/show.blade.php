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

<h1>Showing {{ $project->project_title }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $project->project_title }}</h2>
        <p>{{ $project->project_body }}</p>
        @foreach ($categories as $value)
        <p>{{ $value->category_title }}</p>
        @endforeach
        <p>{{ $project->created_at }}</p>
        <p>{{ $project->updated_at }}</p>
    </div>

</div>
</body>
</html>