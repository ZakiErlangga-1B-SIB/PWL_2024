<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel; // Panggil model yang benar
use App\Http\Controllers\KategoriController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    // Menampilkan semua data kategori
    public function index()
    {
        $kategori = KategoriModel::all(); // Panggil KategoriModel, bukan Kategori
        return view('kategori.index', compact('kategori'));
    }

    // Menampilkan form tambah kategori
    public function create()
    {
        return view('kategori.create');
    }

    // Menyimpan data kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'kodeKategori' => 'required|unique:m_kategori,kategori_kode',
            'namaKategori' => 'required'
        ]);

        KategoriModel::create([
            'kategori_kode' => $request->kodeKategori,
            'kategori_nama' => $request->namaKategori,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    // Menampilkan form edit kategori
    public function edit($id)
    {
        $kategori = KategoriModel::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    // Memperbarui data kategori
    public function update(Request $request, $id)
    {
        $request->validate([
            'kodeKategori' => 'required|unique:m_kategori,kategori_kode,' . $id . ',kategori_id',
            'namaKategori' => 'required'
        ]);

        $kategori = KategoriModel::findOrFail($id);
        $kategori->update([
            'kategori_kode' => $request->kodeKategori,
            'kategori_nama' => $request->namaKategori,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui');
    }

    // Menghapus data kategori
    public function destroy($id)
    {
        $kategori = KategoriModel::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
