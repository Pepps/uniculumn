<!DOCTYPE html>
<html>
<head>
    <title>Uniculum</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<div class="jumbotron text-center">
  <div class="page-header">
    <h1>{{ $project->project_title }}<small> {{ $project->created_at }}</small></h1>
  </div>
  <p>{{ $user->fname }} {{ $user->lname }}</p>
  @foreach ($categories as $value)
    <span class="label label-default">{{ $value->category_title }}</span>
  @endforeach
  {{ Markdown::parse($project->project_body) }}
</div>

</div>
</body>
</html>
