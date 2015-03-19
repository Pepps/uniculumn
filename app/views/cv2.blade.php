@extends('layouts.master')
@section('content')

<style>
  body{
    background: #fff;
  }
</style>
<br><br>
  <div id="body">
    <div id="cv-wrapper">
      <div id="inputs">
        <input class="search" id="search" placeholder="Sök i CVt"><button class="button" id="pdf">Konvertera till pdf</button>
      </div>

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

      <h3><br>Om mig</br></h3><hr>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis dictum nunc at porta.
      Nullam ac venenatis risus. In tincidunt consequat rhoncus. Donec in laoreet metus.
      Ut lacus urna, iaculis eget nunc a, elementum consectetur enim.
      Phasellus vel scelerisque purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis dictum nunc at porta.
      Nullam ac venenatis risus. In tincidunt consequat rhoncus. Donec in laoreet metus.
      Ut lacus urna, iaculis eget nunc a, elementum consectetur enim.
      Phasellus vel scelerisque purus.</p>

      <div class="list">

        <h3><br>Projekt jag deltar i</br></h3><hr>
        @foreach($projects as $project)
          <a href="/project/{{$project->id}}" style="margin-left: 2%;">{{$project->title}}</a>
        @endforeach

        <h3><br>Utbildningar</br></h3><hr>
        @foreach($exps as $exp)
          @if($exp->type == 0)
            <div>
              <p class="title"><b>{{$exp->title}}<span class="year" style="float:right; margin-right: 5%;">{{$exp->duration}}</span></b></p>
              <p style="margin-top: -10px">{{$exp->description}}</p>
            </div>
          @endif
        @endforeach

        <h3><br>Anstälningar</br></h3><hr>
        @foreach($exps as $exp)
          @if($exp->type == 1)
            <div>
              <p class="title"><b>{{$exp->title}}<span class="year" style="float:right; margin-right: 5%;">{{$exp->duration}}</span></b></p>
              <p style="margin-top: -10px">{{$exp->description}}</p>
            </div>
          @endif
        @endforeach

        <h3><br>Meriter</br></h3><hr>
        @foreach($exps as $exp)
          @if($exp->type == 2)
            <div>
              <p class="title"><b>{{$exp->title}}<span class="year" style="float:right; margin-right: 5%;">{{$exp->duration}}</span></b></p>
              <p style="margin-top: -10px">{{$exp->description}}</p>
            </div>
          @endif
        @endforeach

        <h3><br>Övrigt</br></h3><hr>
        @foreach($exps as $exp)
          @if($exp->type == 3)
            <div>
              <p class="title"><b>{{$exp->title}}<span class="year" style="float:right; margin-right: 5%;">{{$exp->duration}}</span></b></p>
              <p style="margin-top: -10px">{{$exp->description}}</p>
            </div>
          @endif
        @endforeach

      </div>

    </div>
  </div>
<script>

var options = {
  valueNames: [ 'title', 'year' ]
};

var userList = new List('cv-wrapper', options);

  var doc = new jsPDF();
  var elementHandler = {
    '#inputs': function (element, renderer) {
      return true;
    }
  };

  document.getElementById("pdf").addEventListener("click",function(e){
    e.preventDefault();

    var source = window.document.getElementsByTagName("body")[0];
    doc.fromHTML(source,15,15,{'width': 180, 'elementHandlers': elementHandler});
    doc.output("dataurlnewwindow");
  });
</script>
@stop
