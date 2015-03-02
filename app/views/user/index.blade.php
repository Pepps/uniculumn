@extends('layouts.master')
@section('content')

<div class="container">

@include('project.projectnav')
@yield('projectnav')

<h3>Profile</h3>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
  <tr><td>{{ $user->firstname }}</td></tr>
  <tr><td>{{ $user->lastname }}</td></tr>
  <tr><td>{{ $user->email }}</td></tr>
</table>

<a class="btn btn-small btn-info" href="user/{{$user->id}}/edit">Redigera</a>

</div>

<script>

  window.onload = function(){

      $("#delmodal-btn").on("click", function(){
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
