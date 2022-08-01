
@extends('layout')
@section('titlePannel','Liste des votes')
@section('body')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            {{-- <div class="pull-left">
                <h2>Liste des vote</h2>
            </div> --}}
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

    <table class="table table-bordered table-striped">
        <tr>
            {{-- <th>id</th> --}}
            <th>Numero Carte membre</th>
            <th>President</th>
            <th>Actions</th>
        </tr>
        @foreach ($votes as $vote)
            <tr>
                {{-- <td>{{ $vote->id }}</td> --}}
                <td>{{ $vote->numeroCarte }}</td>
                <td>{{ $vote->president }}</td>
                <td>
                    <form action="{{ route('votes.destroy', $vote->id) }}" method="Post">
                        {{-- <a class="btn btn-primary" href="{{ route('votes.edit',$vote->id) }}">Edit</a> --}}
                        <a class="btn btn-primary" href="{{ route('votes.show', $vote->id) }}">Show</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{-- <div class="card border-primary mb-3" style="max-width: 20rem;">
        <div class="card-header">Nombre de votants {{ $countAmadou+ $countAlsane  }}</div>
        <div class="card-body">
            <h4 class="card-title">Amadou I SARR: {{ $countAmadou }}</h4>
            <h4 class="card-title">Alsane SARR: {{ $countAlsane }}</h4>
        </div>
    </div> --}}
    {{-- {!! $votes->links() !!} --}}
@endsection
