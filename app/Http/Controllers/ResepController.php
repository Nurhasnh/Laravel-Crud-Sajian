<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResepController extends Controller
{
    public function index() {
        $reseps = Resep::latest()->get();
        return view('resep.index', compact('reseps'));
    }

    public function create() {
        return view('resep.create');
    }

    public function store(Request $request) {
        $request->validate([
            'judul' => 'required',
            'bahan' => 'required',
            'cara_membuat' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->only(['judul', 'bahan', 'cara_membuat']);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('reseps', $filename, 'public');
            $data['gambar'] = $path;
        }

        Resep::create($data);
        return redirect()->route('resep.index')->with('success', 'Resep berhasil ditambahkan.');
    }

    public function show(Resep $resep) {
        return view('resep.show', compact('resep'));
    }

    public function edit(Resep $resep) {
        return view('resep.edit', compact('resep'));
    }

    public function update(Request $request, Resep $resep) {
        $request->validate([
            'judul' => 'required',
            'bahan' => 'required',
            'cara_membuat' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->only(['judul', 'bahan', 'cara_membuat']);

        if ($request->hasFile('gambar')) {
            if ($resep->gambar) {
                Storage::disk('public')->delete($resep->gambar);
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('reseps', $filename, 'public');
            $data['gambar'] = $path;
        }

        $resep->update($data);
        return redirect()->route('resep.index')->with('success', 'Resep berhasil diperbarui.');
    }

    public function destroy(Resep $resep) {
        if ($resep->gambar) {
            Storage::disk('public')->delete($resep->gambar);
        }

        $resep->delete();
        return redirect()->route('resep.index')->with('success', 'Resep berhasil dihapus.');
    }
}
