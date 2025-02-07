<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index() {
        $artikels = Artikel::latest()->get(); // Ambil semua artikel terbaru
        return view('artikel.index', compact('artikels'));
    }

    public function create() {
        return view('artikel.create');
    }

    public function store(Request $request) {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->only(['judul', 'deskripsi']);
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('artikels', 'public');
        }

        Artikel::create($data);
        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function show(Artikel $artikel) {
        return view('artikel.show', compact('artikel'));
    }

    public function edit(Artikel $artikel) {
        return view('artikel.edit', compact('artikel'));
    }

    public function update(Request $request, Artikel $artikel) {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->only(['judul', 'deskripsi']);
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('artikels', 'public');
        }

        $artikel->update($data);
        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Artikel $artikel) {
        $artikel->delete();
        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
