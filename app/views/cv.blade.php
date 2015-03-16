@extends('layouts.master')

@section('content')

<div id="cv-search">
      <input class="search" placeholder="Search" />
      <button class="sort" data-sort="title">Sort by name</button>
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

        <div class="list">

          <h3>Utbildningar</h3>
          @foreach($exps as $exp)
            @if($exp->type == 0)
              <div>
                <p class="title"><b>{{$exp->title}}<span class="year" style="float:right;">{{$exp->duration}}</span></b></p>
                <p style="margin-top: -10px">{{$exp->description}}</p>
              </div>
            @endif
          @endforeach

          <h3>Anstälningar</h3>
          @foreach($exps as $exp)
            @if($exp->type == 1)
              <div>
                <p class="title"><b>{{$exp->title}}<span class="year" style="float:right;">{{$exp->duration}}</span></b></p>
                <p style="margin-top: -10px">{{$exp->description}}</p>
              </div>
            @endif
          @endforeach

        </div>
      </div>

</div>

@stop
