<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Susut;

class SusutController extends Controller
{
    // Menampilkan halaman utama dengan grafik
    public function index()
{
    $susuts = Susut::orderBy('tanggal', 'desc')->paginate(10);
    return view('susut.index', compact('susuts'));
}


    // Menampilkan halaman form tambah data
    public function create()
    {
        return view('susut.create');
    }

    public function login()
    {
        return view('susut.login');
    }
    

    // Menyimpan data ke database
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah_susut' => 'required|numeric|min:0',
        ]);
    
        Susut::create($request->all());
    
        return redirect()->route('susut.index')->with('success', 'Data berhasil ditambahkan!');
    }
    public function destroy($id)
    {
        $susut = Susut::findOrFail($id);
        $susut->delete();
    
        return redirect()->route('susut.index')->with('success', 'Data berhasil dihapus');
    }


    // Menampilkan halaman edit
    public function edit($id)
    {
        $susut = Susut::findOrFail($id);
        return view('susut.edit', compact('susut'));
    }

    // Menyimpan perubahan data
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah_susut' => 'required|numeric|min:0'
        ]);

            
        $susut = Susut::findOrFail($id);
        $susut->update([
            'tanggal' => $request->tanggal,
            'jumlah_susut' => $request->jumlah_susut
        ]);

        return redirect()->route('susut.index')->with('success', 'Data susut berhasil diperbarui.');
    }
}
