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
<br><br><br><br>
<div class="container">

  <p>Filip Ramstedt</p>
  <p>Fridhemsgatan 22</p>
  <p>Karlshamn Blekinga Län</p>
  <br>
  <p>Telefon: 0707102178</p>
  <p>Email: filipramstedt@gmai.com</p>

  <h3>Om mig </h3>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis dictum nunc at porta.
  Nullam ac venenatis risus. In tincidunt consequat rhoncus. Donec in laoreet metus.
  Ut lacus urna, iaculis eget nunc a, elementum consectetur enim.
  Phasellus vel scelerisque purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis dictum nunc at porta.
  Nullam ac venenatis risus. In tincidunt consequat rhoncus. Donec in laoreet metus.
  Ut lacus urna, iaculis eget nunc a, elementum consectetur enim.
  Phasellus vel scelerisque purus.</p>

  <h3>Utbildningar</h3>
  <p><b>Media programmet, Kungsgårdgymnasiet Norrköping<span style="float:right;">2008-2011</span></b></p>
  <p style="margin-top: -10px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis dictum nunc at porta.
  Nullam ac venenatis risus. In tincidunt consequat rhoncus. Donec in laoreet metus.
  Ut lacus urna, iaculis eget nunc a, elementum consectetur enim.
  Phasellus vel scelerisque purus.</p>

  <p><b>Interaktiva Digitala Medier, Linnéunivärsitetet Växjö<span style="float:right;">2012-2013</span></b></p>
  <p style="margin-top: -10px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis dictum nunc at porta.
  Nullam ac venenatis risus. In tincidunt consequat rhoncus. Donec in laoreet metus.
  Ut lacus urna, iaculis eget nunc a, elementum consectetur enim.
  Phasellus vel scelerisque purus.</p>

  <p><b>Webbutveckling, Blekinge Tekniska Högskola Karlshamn<span style="float:right;">2014-2017  </span></b></p>
  <p style="margin-top: -10px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis dictum nunc at porta.
  Nullam ac venenatis risus. In tincidunt consequat rhoncus. Donec in laoreet metus.
  Ut lacus urna, iaculis eget nunc a, elementum consectetur enim.
  Phasellus vel scelerisque purus.</p>

  <h3>Anstälningar</h3>

  <p><b>Fotograf (praktik), Norrköpings tidningar Norrköping<span style="float:right;">2005</span></b></p>
  <p style="margin-top: -10px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis dictum nunc at porta.
  Nullam ac venenatis risus. In tincidunt consequat rhoncus. Donec in laoreet metus.
  Ut lacus urna, iaculis eget nunc a, elementum consectetur enim.
  Phasellus vel scelerisque purus.</p>

  <p><b>Fotograf (praktik), Atelje Carlsbecker Norrköping<span style="float:right;">2010</span></b></p>
  <p style="margin-top: -10px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis dictum nunc at porta.
  Nullam ac venenatis risus. In tincidunt consequat rhoncus. Donec in laoreet metus.
  Ut lacus urna, iaculis eget nunc a, elementum consectetur enim.
  Phasellus vel scelerisque purus.</p>

  <p><b>Fotograf (praktik), Fredriknågotinkpg Norrköping<span style="float:right;">2010</span></b></p>
  <p style="margin-top: -10px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis dictum nunc at porta.
  Nullam ac venenatis risus. In tincidunt consequat rhoncus. Donec in laoreet metus.
  Ut lacus urna, iaculis eget nunc a, elementum consectetur enim.
  Phasellus vel scelerisque purus.</p>

</div>

@stop
