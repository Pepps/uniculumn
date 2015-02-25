<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>uniculum.se</title>
    <link href="css/style.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" href="img/favicon.ico" />
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
 </head>
<body>
    @yield('content')

    <script src="javascript/jquery-2.1.3.min.js"></script>
    <script src="javascript/jquery-ui-1.9.2.js"></script>
    <script src="javascript/jquery.ui.touch-punch.js"></script>
    <script src="javascript/user_jquery.js"></script>
    <script src="javascript/urlgen.js"></script>
    <script src="https://apis.google.com/js/client:platform.js" async defer></script>
    {{ HTML::script('javascript/ajax.js') }}

    {{ HTML::script('javascript/jquery-2.1.3.min.js') }}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

</body>
</html>
