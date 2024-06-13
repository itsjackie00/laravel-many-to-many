@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $project->title }}</h1>
    <p>{{ $project->description }}</p>
    @if($project->image)
    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="img-thumbnail" width="300">
    @endif
    <br>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary mt-3">Torna indietro</a>
</div>
@endsection
