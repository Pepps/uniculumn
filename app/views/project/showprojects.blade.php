@extends('layouts.master')
@section('content')
<style type="text/css" media="screen">
    #editor {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 20%;
    }

    #files li {
      list-style: none;
    }
</style>

<br>
<ul id="files">
    @foreach ($files as $file)
      @if (pathinfo($file, PATHINFO_EXTENSION) == "jpg")
        <li><i class="fa fa-file-image-o"></i> {{$file}}</li>
      @elseif (pathinfo($file, PATHINFO_EXTENSION) == "js")
        <li><i class="fa fa-file-code-o"></i> {{$file}}</li>
      @elseif (pathinfo($file, PATHINFO_EXTENSION) == "txt")
        <li><i class="fa fa-file-text-o"></i> {{$file}}</li>
      @else
        <li><i class="fa fa-file-o"></i> {{ $file }}</li>
      @endif
    @endforeach
</ul>

<div id="editor">
</div>


{{ HTML::script('javascript/ace/ace.js') }}
<script>
  var editor = ace.edit("editor");
  editor.setTheme("ace/theme/monokai");
  editor.getSession().setMode("ace/mode/javascript");

  editor.setOptions({
    fontSize: "13pt"
  });
</script>
@stop
