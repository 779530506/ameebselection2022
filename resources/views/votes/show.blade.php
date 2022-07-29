<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add vote Form - Laravel 9 CRUD</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mb-2">
<h2>Show Vote</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('votes.index') }}"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<br><br>
<div class="card border-primary mb-3" style="max-width: 20rem;">
    <div class="card-header">{{$vote->numeroCarte}}</div>
    <div class="card-body">
      <h4 class="card-title">{{$vote->president}}</h4>
    </div>
  </div>

</body>
</html>
