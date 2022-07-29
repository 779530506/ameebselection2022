<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add membre Form - Laravel 9 CRUD</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mb-2">
<h2>Edit membre</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('membres.index') }}"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('membres.update',$membre->id) }}" method="POST" >
@csrf
@method('PUT')
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Numero de la carte membre:</strong>
<input type="text" name="numeroCarte" class="form-control" value="{{ $membre->numeroCarte }}" placeholder="numero carte etudiant">
@error('numeroCarte')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="form-group">
    <strong>Numero telephone:</strong>
    <input type="text" name="telephone" class="form-control" value="{{ $membre->telephone }}">
    @error('telephone')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
 </div>


<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>
</body>
</html>
