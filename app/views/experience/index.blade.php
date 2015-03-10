@extends('layouts.master')
@section('content')

<div class="container">

@include('project.projectnav')
@yield('projectnav')

<h3>Your experiences</h3>

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <td><b>#</b></td>
      <td><b>Title</b></td>
      <td><b>Description</b></td>
      <td><b>From</b></td>
      <td><b>To</b></td>
    </tr>
  </thead>

    <tbody>
    <span style="display: none;">{{$i = 1}}</span>
    @foreach($experiences as $value)
        <tr>
            <td>{{$i++}}</td>
            <td class="pi" style="display: none;">{{$value->id}}</td>
            <td class="pt">{{$value->title}}</td>
            <td>{{str_limit($value->body, $limit = 200, $end = '...')}}</td>
            <td>{{$value->created_at}}</td>
            <td><a class="btn btn-small btn-success" href="{{ URL::to('experience/' . $value->id) }}"><i class="fa fa-search"></i></a></td>
            <td><a class="btn btn-small btn-info" href="{{ URL::to('experience/' . $value->id . '/edit') }}"><i class="fa fa-pencil-square-o"></i></a></td>
            <td><a class="btn btn-small btn-info" href="{{ URL::to('experience/' . $value->id . '/addref') }}"><i class="fa fa-plus"></i></a></td>
            <td><button class="btn btn-small btn-danger" id="delmodal-btn"><i class="fa fa-trash"></i></button></td>
        </tr>
    @endforeach
    </tbody>
</div>


</div>
