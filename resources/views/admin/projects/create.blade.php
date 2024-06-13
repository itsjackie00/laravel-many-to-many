@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Aggiungi Nuovo Progetto</h1>
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" class="form-control" id="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" class="form-control" id="description" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input type="file" name="image" class="form-control" id="image">
        </div>
        <button type="submit" class="btn btn-primary">Salva</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Annulla</a>
    </form>
</div>
@endsection
