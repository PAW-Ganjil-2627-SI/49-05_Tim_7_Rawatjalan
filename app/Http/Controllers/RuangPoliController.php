<?php

namespace App\Http\Controllers; 

use App\Models\RuangPoli;
use Illuminate\Http\Request;

class RuangPoliController extends Controller
{
    public function index()
    {
        $ruangPolis = RuangPoli::all();
        return view('ruang_poli.index', compact('ruangPolis'));
    }

    public function create()
    {
        return view('ruang_poli.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_poli' => 'required',
            'lokasi_gedung' => 'required',
            'alat_medis' => 'required',
        ]); 

        RuangPoli::create($request->except(['_token']));

        return redirect()->route('ruang-poli.index')->with('success', 'Data ruang poliklinik berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $ruangPoli = RuangPoli::findOrFail($id);
        return view('ruang_poli.edit', compact('ruangPoli'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_poli' => 'required',
            'lokasi_gedung' => 'required',
            'alat_medis' => 'required',
        ]);

        $ruangPoli = RuangPoli::findOrFail($id);
        
        $ruangPoli->update($request->except(['_token', '_method']));

        return redirect()->route('ruang-poli.index')->with('success', 'Data ruang poliklinik berhasil diupdate!');
    }

    public function destroy($id)
    {
        $ruangPoli = RuangPoli::findOrFail($id);
        $ruangPoli->delete();

        return redirect()->route('ruang-poli.index')->with('success', 'Data ruang poliklinik berhasil dihapus!');
    }
}