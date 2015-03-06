<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>uniculum.se</title>
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" />
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    {{ HTML::style('css/style.css') }}
 </head>
<body>
    @yield('content')

    {{ HTML::script('javascript/jquery-2.1.3.min.js') }}
    {{ HTML::script('javascript/jquery-ui-1.9.2.js') }}
    {{ HTML::script('javascript/jquery.ui.touch-punch.js') }}
    {{ HTML::script('javascript/user_jquery.js') }}
    {{ HTML::script('javascript/urlgen.js') }}
    {{ HTML::script('javascript/typeahead.bundle.js') }}
    {{ HTML::script('javascript/ajax.js') }}
    {{ HTML::script('javascript/ace/ace.js') }}
    {{ HTML::script('javascript/jszip/dist/jszip.js') }}
    {{ HTML::script('javascript/dropzone.js') }}
    <script src="https://apis.google.com/js/client:platform.js" async defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

</body>
</html>
