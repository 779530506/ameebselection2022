<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Membre</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Liste des membres</h2>
</div>
@if (Auth::user())
<div class="pull-right mb-2">
    <a class="btn btn-success" href="{{ route('membres.create') }}"> Create membre</a>
    </div>
@endif

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
<th>Numero Carte Membre</th>
<th>Telephone</th>

</tr>
@foreach ($membres as $membre)
<tr>
<td>{{ $membre->id }}</td>
<td>{{ $membre->numeroCarte }}</td>
<td>{{ $membre->telephone }}</td>
@if (Auth::user())
<td>
<form action="{{ route('membres.destroy',$membre->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('membres.edit',$membre->id) }}">Edit</a>
<a class="btn btn-primary" href="{{ route('membres.show',$membre->id) }}">Show</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
@endif
</tr>
@endforeach
</table>
{!! $membres->links() !!}
</body>
</html>
