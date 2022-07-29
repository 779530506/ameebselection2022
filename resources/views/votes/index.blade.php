<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Laravel 9 CRUD Tutorial Example</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Liste des vote</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('votes.create') }}"> Create vote</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>id</th>
<th>Numero</th>
<th>choix</th>

</tr>
@foreach ($votes as $vote)
<tr>
<td>{{ $vote->id }}</td>
<td>{{ $vote->numeroCarte }}</td>
<td>{{ $vote->president }}</td>
<td>
<form action="{{ route('votes.destroy',$vote->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('votes.edit',$vote->id) }}">Edit</a>
<a class="btn btn-primary" href="{{ route('votes.show',$vote->id) }}">Show</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $votes->links() !!}
</body>
</html>
