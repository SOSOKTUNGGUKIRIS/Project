<!-- resources/views/modul/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Tambah Modul Baru</h1>

    <form action="{{ route('modul.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul') }}" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi') }}</textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Simpan</button>
    </form>
@endsection
