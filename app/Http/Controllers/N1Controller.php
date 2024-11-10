<?php

namespace App\Http\Controllers;

use App\Models\N1;
use Illuminate\Http\Request;

class N1Controller extends Controller
{
    public function index()
    {
        $n1 = N1::all();
        return view('surat.n1', compact('n1'));
    }

    public function create()
    {
        return view('n1.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_calon_pengantin_pria' => 'required|string|max:255',
            'nama_calon_pengantin_wanita' => 'required|string|max:255',
            'tanggal_pernikahan' => 'required|date',
            'status_persetujuan' => 'required|in:disetujui,belum disetujui',
        ]);

        N1::create($request->all());

        return redirect()->route('birth-certificates.index')->with('success', 'Data berhasil disimpan.');
    }

    public function show($id)
    {
        $n1 = N1::find($id);
        return view('n1.show', compact('n1'));
    }

    public function edit($id)
    {
        $n1 = N1::find($id);
        return view('n1.edit', compact('n1'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_calon_pengantin_pria' => 'required|string|max:255',
            'nama_calon_pengantin_wanita' => 'required|string|max:255',
            'tanggal_pernikahan' => 'required|date',
            'status_persetujuan' => 'required|in:disetujui,belum disetujui',
        ]);

        $n1 = N1::find($id);
        $n1->update($request->all());

        return redirect()->route('n1.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $n1 = N1::find($id);
        $n1->delete();

        return redirect()->route('n1.index')->with('success', 'Data berhasil dihapus.');
    }
}
