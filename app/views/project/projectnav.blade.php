@section('projectnav')
<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ URL::to('project') }}">Uniculum</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('project') }}">View All projects</a></li>
        <li><a href="{{ URL::to('project/create') }}">Create a project</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/user"><i class="fa fa-user"></i> Profil</a></li>
        <li><a style="float: right;" href="/logout"><i class="fa fa-sign-out"></i>
 Log out</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>

@stop
