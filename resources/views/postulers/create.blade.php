<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add postuler Form - Laravel 9 CRUD</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mb-2">
<h2>Add postuler</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('postulers.index') }}"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('postulers.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Numero de la carte etudiant:</strong>
<input type="text" name="numeroCarte" class="form-control" placeholder="numero carte etudiant">
@error('numeroCarte')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
<div class="form-group">
    <strong>Telephone:</strong>
    <input type="text" name="telephone" class="form-control" placeholder="telephone">
    @error('telephone')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Presisent:</strong>
<div class="form-check">
    <input class="form-check-input" type="radio" name="president" value="amadou" id="flexRadioDefault1">
    <label class="form-check-label" for="flexRadioDefault1">
      Amadou Ibrahima SARR
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" value="alsane" name="president" id="flexRadioDefault2" checked>
    <label class="form-check-label" for="flexRadioDefault2">
      Alsane SARR
    </label>
  </div>
@error('president')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>
</body>
</html>
