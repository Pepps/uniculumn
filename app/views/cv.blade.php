@extends('layouts.master')

@section('content')

@include('layouts.nav')
@yield('nav')
  <div id="main_content">
    <div id="cv-wrapper">
      <div id="inputs">
        <input class="search uploadfile" id="search" placeholder="Sök i CVt"><button class="submit_project" id="pdf" style="cursor: pointer;">Konvertera till pdf</button>
      </div>

      <h3><b>{{$user->firstname}} {{$user->lastname}}</b></h3>
      @if($user->city_id != null)
        <p>{{$user->address}} <span>{{$user->zipcode}}, {{$city->name}}</span></p>
      @endif
      <br>
      @if($user->phone != null)
        <p>Telefon: {{$user->phone}}</p>
      @endif
      <p>Email: {{$user->email}}</p>

      <h3><br>Om mig</br></h3><hr>
      <p>{{$user->description}}</p>

      <div class="list">

        <h3><br>Projekt jag deltar i</br></h3><hr>
        @foreach($projects as $project)
          <a href="/project/{{$project->id}}" style="margin-right: 0.5vw;">{{$project->title}}</a>
        @endforeach

        <h3><br>Utbildningar</br></h3><hr>
        @foreach($exps as $exp)
          @if($exp->type == 1)
            <div>
              <span class="exptitle"><b>{{$exp->location}}<span class="year" style="float:right;">{{$exp->duration}}</span></b></span>
              <p class="expdesc" style="margin-top: 0vw;">{{$exp->description}}</p>
            </div>
          @endif
        @endforeach

        <h3><br>Anstälningar</br></h3><hr>
        @foreach($exps as $exp)
          @if($exp->type == 0)
            <div>
              <span class="exptitle"><b>{{$exp->location}}<span class="year" style="float:right;">{{$exp->duration}}</span></b></span>
              <p class="expdesc" style="margin-top: 0vw;">{{$exp->description}}</p>
            </div>
          @endif
        @endforeach

        <h3><br>Meriter</br></h3><hr>
        @foreach($exps as $exp)
          @if($exp->type == 2)
            <div>
              <span class="exptitle"><b>{{$exp->location}}<span class="year" style="float:right;">{{$exp->duration}}</span></b></span>
              <p class="expdesc" style="margin-top: 0vw;">{{$exp->description}}</p>
            </div>
          @endif
        @endforeach

        <h3><br>Övrigt</br></h3><hr>
        @foreach($exps as $exp)
          @if($exp->type == 3)
            <div>
              <span class="exptitle"><b>{{$exp->location}}<span class="year" style="float:right;">{{$exp->duration}}</span></b></span>
              <p class="expdesc" style="margin-top: 0vw;">{{$exp->description}}</p>
            </div>
          @endif
        @endforeach

      </div>

      <h3><br>Referenser</br></h3><hr>
      @if(sizeOf($reffs) === 0)
        <p>Referenser lämnas på begäran</p>
      @else
        @foreach($reffs as $reff)
            <div>
              <span><b>{{$reff->firstname}} {{$reff->lastname}}</b></span> <span style="margin-left: 20vw;">{{$reff->email}}</span> <span style="float: right;">{{$reff->phone}}</span>
            </div>
        @endforeach
      @endif

    </div>
  </div>
@stop
