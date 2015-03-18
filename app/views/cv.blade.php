@extends('layouts.master')

@section('content')

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Uniculum</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" placeholder="Sök..." class="form-control">
        </div>
        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i>
</button>
<button type="submit" class="btn btn-primary"><i class="fa fa-file-pdf-o"></i> Hämta som PDF</button>
      </form>
    </div><!--/.navbar-collapse -->
  </div>
</nav>
<br><br><br><br><br><br>
<div class="container">

  <p>{{$user->firstname}} {{$user->lastname}}</p>
  @if($user->city_id != null)
    <p>{{$user->address}}</p>
    <p>{{$city->name}} {{State::find($city->state_id)->name}}</p>
  @endif
  <br>
  @if($user->phone != null)
    <p>Telefon: {{$user->phone}}</p>
  @endif
  <p>Email: {{$user->email}}</p>

  <h3>Om mig </h3>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis dictum nunc at porta.
  Nullam ac venenatis risus. In tincidunt consequat rhoncus. Donec in laoreet metus.
  Ut lacus urna, iaculis eget nunc a, elementum consectetur enim.
  Phasellus vel scelerisque purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis dictum nunc at porta.
  Nullam ac venenatis risus. In tincidunt consequat rhoncus. Donec in laoreet metus.
  Ut lacus urna, iaculis eget nunc a, elementum consectetur enim.
  Phasellus vel scelerisque purus.</p>

  <h3>Projekt jag deltar i</h3>
  @foreach($projects as $project)
    <a href="/project/{{$project->id}}">{{$project->title}}</a>
  @endforeach

  <h3>Utbildningar</h3>
  @foreach($exps as $exp)
    @if($exp->type == 0)
      <p><b>{{$exp->title}}<span style="float:right;">{{$exp->duration}}</span></b></p>
      <p style="margin-top: -10px">{{$exp->description}}</p>
    @endif
  @endforeach

  <h3>Anstälningar</h3>
  @foreach($exps as $exp)
    @if($exp->type == 1)
      <p><b>{{$exp->title}}<span style="float:right;">{{$exp->duration}}</span></b></p>
      <p style="margin-top: -10px">{{$exp->description}}</p>
    @endif
  @endforeach

</div>

@stop
