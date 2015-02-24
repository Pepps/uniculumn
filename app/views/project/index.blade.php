<!DOCTYPE html>
<html>
<head>
    <title>projects</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">

@include('project.projectnav')
@yield('projectnav')

<h3>Your projects</h3>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td><b>#</b></td>
            <td><b>project title</b></td>
            <td><b>project body</b></td>
            <td><b>Created at</b></td>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>
    </thead>
    <tbody>
    <span style="display: none;">{{$i = 1}}</span>
    @foreach($projects as $value)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$value->project_title}}</td>
			      <td>{{str_limit($value->project_body, $limit = 200, $end = '...')}}</td>
            <td>{{$value->created_at}}</td>
            <td><a class="btn btn-small btn-success" href="{{ URL::to('project/' . $value->id) }}"><i class="fa fa-search"></i>
</a></td>
            <td><a class="btn btn-small btn-info" href="{{ URL::to('project/' . $value->id . '/edit') }}"><i class="fa fa-pencil-square-o"></i>
</a></td>
            <td><button class="btn btn-small btn-danger"><i class="fa fa-trash"></i>
</button></td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>
