@extends('layouts.master')

@section('content')

<div class="container">

<div class="jumbotron text-center">
  <div class="page-header">
    <h1>{{ $project->title }}<small> {{str_limit($project->created_at, $limit = 10, $end = '')}}</small></h1>
  </div>

 
  @foreach ($categories as $value)
    <span class="label label-default">{{ $value->title }}</span>
  @endforeach
  {{ Markdown::parse($project->body) }}
</div>
@stop
