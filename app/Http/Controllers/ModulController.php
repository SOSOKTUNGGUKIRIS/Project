<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use Illuminate\Http\Request;

class ModulController extends Controller
{
    // Menampilkan semua modul
    public function index()
    {
        $moduls = Modul::all();  // Ambil semua data modul
        return view('modul.index', compact('moduls'));  // Kirim data ke tampilan modul.index
    }

    // Menampilkan form untuk membuat modul baru
    public function create()
    {
        return view('modul.create');
    }

    // Menyimpan data modul baru
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
        ]);

        // Simpan modul baru
        Modul::create($validated);

        // Redirect ke halaman modul
        return redirect()->route('modul.index');
    }

    // Menampilkan form untuk mengedit modul
    public function edit($id)
    {
        $modul = Modul::findOrFail($id);  // Ambil modul berdasarkan ID
        return view('modul.edit', compact('modul'));
    }

    // Memperbarui data modul
    public function update(Request $request, $id)
    {
        $modul = Modul::findOrFail($id);

        // Validasi data
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
        ]);

        // Update data modul
        $modul->update($validated);

        return redirect()->route('modul.index');
    }

    // Menghapus modul
    public function destroy($id)
    {
        $modul = Modul::findOrFail($id);
        $modul->delete();

        return redirect()->route('modul.index');
    }
}
