@extends('layouts.master')

@section('content')
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

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-small btn-danger" data-toggle="modal" data-target="#myModal">Radera Projekt</button>

            </td>
    @endforeach        </tr>

    </tbody>
</table>


</div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
              </div>
              <div class="modal-body">
                KOm iGne
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
@stop
