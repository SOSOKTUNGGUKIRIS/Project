<!-- resources/views/modul/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit Modul</h1>

    <form action="{{ route('modul.update', $modul->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $modul->judul) }}" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi', $modul->deskripsi) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Perbarui</button>
    </form>
@endsection
