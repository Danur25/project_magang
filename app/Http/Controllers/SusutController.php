<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Susut;

class SusutController extends Controller
{
    // Menampilkan halaman login
    public function login()
    {
        return view('susut.login');
    }

    // Menampilkan halaman utama dengan grafik dan tabel data
    public function index()
    {
        $susuts = Susut::all();
        return view('susut.index', compact('susuts'));
    }

    // Menampilkan halaman form tambah data
    public function create()
    {
        return view('susut.create');
    }

    // Menyimpan data ke database
    public function store(Request $request)
    {
        $request->validate([
            'ulp' => 'required|string',
            'tanggal' => 'required|date',
            'jumlah_susut' => 'required|numeric',
            'tahun' => 'required|numeric',
            'bulan' => 'required|numeric',
        ]);

        Susut::create([
            'ulp' => $request->ulp,
            'tanggal' => $request->tanggal,
            'jumlah_susut' => $request->jumlah_susut,
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
        ]);

        return redirect()->route('susut.index')->with('success', 'Data berhasil disimpan!');
    }

    // Menghapus data dari database
    public function destroy($id)
    {
        $susut = Susut::findOrFail($id);
        $susut->delete();

        return redirect()->route('susut.index')->with('success', 'Data berhasil dihapus');
    }

    // Menampilkan halaman edit data
    public function edit($id)
    {
        $susut = Susut::findOrFail($id); // Ambil data berdasarkan ID
        return view('susut.edit', compact('susut')); // Tampilkan halaman edit
    }

    // Memperbarui data di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'ulp' => 'required|string',
            'tanggal' => 'required|date',
            'jumlah_susut' => 'required|numeric',
            'tahun' => 'required|numeric',
            'bulan' => 'required|numeric',
        ]);

        // Ambil data yang akan diupdate
        $susut = Susut::findOrFail($id);

        // Update data
        $susut->update([
            'ulp' => $request->ulp,
            'tanggal' => $request->tanggal,
            'jumlah_susut' => $request->jumlah_susut,
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
        ]);

        return redirect()->route('susut.index')->with('success', 'Data berhasil diperbarui!');
    }
}