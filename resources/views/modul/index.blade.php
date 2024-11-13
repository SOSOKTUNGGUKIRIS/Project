<!-- resources/views/modul/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Daftar Modul</h1>
    <a href="{{ route('modul.create') }}" class="btn btn-primary">Buat Modul Baru</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($moduls as $modul)
                <tr>
                    <td>{{ $modul->judul }}</td>
                    <td>{{ $modul->deskripsi }}</td>
                    <td>
                        <a href="{{ route('modul.edit', $modul->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('modul.destroy', $modul->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
