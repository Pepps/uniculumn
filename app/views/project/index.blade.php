@extends('layouts.master')
@section('content')

<div class="container">

@include('layouts.nav')
@yield('nav')

<h3>Your projects</h3>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-success col-md-4"><b>{{ Session::get('message') }}</b></div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td><b>#</b></td>
            <td><b>project title</b></td>
            <td><b>project body</b></td>
            <td><b>Created at</b></td>

        </tr>
    </thead>
    <tbody>
    <span style="display: none;">{{$i = 1}}</span>
    @foreach($projects as $value)
        <tr>
            <td>{{$i++}}</td>
            <td class="pi" style="display: none;">{{$value->id}}</td>
            <td class="pt">{{$value->title}}</td>
            <td>{{str_limit($value->body, $limit = 200, $end = '...')}}</td>
            <td>{{$value->created_at}}</td>
            <td><a class="btn btn-small btn-success" href="{{ URL::to('project/' . $value->id) }}"><i class="fa fa-search"></i></a></td>

            @if ($value->user_id != Auth::user()->id)
              <td><a class="btn btn-small btn-info" disabled="disabled" href="{{ URL::to('project/' . $value->id . '/edit') }}"><i class="fa fa-pencil-square-o"></i></a></td>
              <td><button class="btn btn-small btn-danger" disabled="disabled"><i class="fa fa-trash"></i></button></td>
            @else
              <td><a class="btn btn-small btn-info" href="{{ URL::to('project/' . $value->id . '/edit') }}"><i class="fa fa-pencil-square-o"></i></a></td>
              <td><button class="btn btn-small btn-danger delmodal-btn"><i class="fa fa-trash"></i></button></td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>


</div>

<script>

  window.onload = function(){

      $(".delmodal-btn").on("click", function(){
        $('#delete').modal('show');
        $('.modal-backdrop').css( "zIndex", -1030 );
        $("#delete-pt").text($(this).parent().parent().find(".pt").text());
        $('#del-btn').attr('href','/project/delete/'+$(this).parent().parent().find(".pi").text());
      });

  }

</script>

<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4 style="text-align:center;">Är du säker på att du vill ta bort <b><span id="delete-pt"></span></b>?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>
        <a class="btn btn-danger" id="del-btn">Ta bort!</a>
      </div>
    </div>
  </div>
</div>

@stop
