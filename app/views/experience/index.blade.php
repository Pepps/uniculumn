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
      <td><b>Type</b></td>
      <td><b>Description</b></td>
      <td><b>Category</b></td>
      <td><b>Duration</b></td>
      <td><b>City</b></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </thead>

    <tbody>
    <span style="display: none;">{{$i = 1}}</span>
    @foreach($experiences as $value)
        <tr>
            <td>{{$i++}}</td>

            <td style="display: none;">{{$value->id}}</td>
            <td>{{$value->title}}</td>
            <td>
            @if ($value->type === '0')
            Utbildning
            @elseif ($value->type === '1')
            Jobb
            @elseif ($value->type === '2')
            Merit
            @elseif ($value->type === '3')
            Övrigt
            @endif
          </td>

            <td>{{str_limit($value->description, $limit = 200, $end = '...')}}</td>
            <td>{{ $value->category_id }}</td>
            <td>{{$value->duration}}</td>
            <td>


              {{ $value->name }}

              
        </td>
            <td><a class="btn btn-small btn-success" href="{{ URL::to('experience/' . $value->id) }}"><i class="fa fa-search"></i></a></td>
            <td><a class="btn btn-small btn-info" href="{{ URL::to('experience/' . $value->id . '/edit') }}"><i class="fa fa-pencil-square-o"></i></a></td>
            <td><a class="btn btn-warning" href="{{ URL::to('experience/' . $value->id . '/addref') }}"><i class="fa fa-plus"></i></a></td>
           <td><a onclick="deleteExp()" method="DELETE" class="btn btn-small btn-danger" href="{{ URL::to('experience/' . $value->id . '/deleteExp') }}"><i class="fa fa-trash"></i>


          </button></td>
        </tr>
    @endforeach
    </tbody>


</div>


</div>


<script>
function deleteExp() {
    confirm("Vill du ta bort?");
}
</script>