<!DOCTYPE html>
<html>
<head>
    <title>projects</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('project') }}">project Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('project') }}">View All projects</a></li>
        <li><a href="{{ URL::to('project/create') }}">Create a project</a>
    </ul>
</nav>

<h1>All the projects</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td><b>#</b></td>
            <td><b>project title</b></td>
            <td><b>project body</b></td>
            <td><b>Created at</b></td>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>
    </thead>
    <tbody>
    <span style="display: none;">{{$i = 1}}</span>
    @foreach($projects as $value)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$value->project_title}}</td>
			      <td>{{$value->project_body}}</td>
            <td>{{$value->created_at}}</td>
            <td><a class="btn btn-small btn-success" href="{{ URL::to('project/' . $value->id) }}">Show this project</a></td>
            <td><a class="btn btn-small btn-info" href="{{ URL::to('project/' . $value->id . '/edit') }}">Edit this project</a></td>
            <td><button class="btn btn-small btn-danger">Radera Projekt</button></td>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>
