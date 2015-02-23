<!DOCTYPE html>
<html>
<head>
    <title>Projects</title>
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

<h1>All the Projects</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Stats</td>
            <td>Project title</td>
            <td>Url</td>
            <td>Project body</td>
        </tr>
    </thead>
    <tbody>
    @foreach($projects as $value)
        <tr>
            <td>{{$value->id }}</td>
            <td>{{$value->user_id}}</td>
            <td>{{$value->stats_id}}</td>
            <td>{{$value->project_title}}</td>
            <td>{{$value->project_url}}</td>
			<td>{{$value->project_body}}</td>


            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the project (uses the destroy method DESTROY /projects/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the project (uses the show method found at GET /projects/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('Project/' . $value->id) }}">Show this Project</a>

                <!-- edit this project (uses the edit method found at GET /projects/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('Project/' . $value->id . '/edit') }}">Edit this Project</a>

                <button class="btn btn-small btn-danger">Radera Projekt</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>
