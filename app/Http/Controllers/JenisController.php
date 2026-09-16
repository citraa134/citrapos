<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index(Request $request)
    {
        // Tangkap input kata kunci pencarian dari form
        $search = $request->input('search');

        // Lakukan pencarian jika ada input, lalu urutkan berdasarkan yang terbaru
        $jenis = Jenis::when($search, function ($query, $search) {
            return $query->where('nama', 'LIKE', '%' . $search . '%');
        })
        ->latest()
        ->get();

        // Kirim data jenis beserta teks pencarian kembali ke view
        return view('jenis.index', compact('jenis', 'search'));
    }

    public function create()
    {
        return view('jenis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Jenis::create($request->only('nama'));

        return redirect()->route('jenis.index')->with('success', 'Jenis berhasil ditambahkan');
    }

    public function edit(Jenis $jenis)
    {
        return view('jenis.edit', ['jenis' => $jenis]);
    }

    public function update(Request $request, Jenis $jenis)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $jenis->update($request->only('nama'));

        return redirect()->route('jenis.index')->with('success', 'Jenis berhasil diupdate');
    }

    public function destroy(Jenis $jenis)
    {
        $jenis->delete();
        return redirect()->route('jenis.index')->with('success', 'Jenis berhasil dihapus');
    }
}
