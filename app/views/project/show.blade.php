@extends('layouts.master')

@section('content')

<div class="container">

<div class="jumbotron text-center">
  <div class="page-header">
    <h1>{{ $project->title }}<small> {{ $project->created_at }}</small></h1>
  </div>
  <p>{{ $user->firstname }} {{ $user->lastname }}</p>
  @foreach ($categories as $value)
    <span class="label label-default">{{ $value->title }}</span>
  @endforeach
  {{ Markdown::parse($project->body) }}
  <a class="btn btn-primary"  href="/project/showfiles/{{ $project->id }}" target="_blank"> visa filer i projektet </a>
</div>
@stop
