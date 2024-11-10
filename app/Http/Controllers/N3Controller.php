<?php

namespace App\Http\Controllers;

use App\Models\N3;
use Illuminate\Http\Request;

class N3Controller extends Controller
{
    public function index()
    {
        $n3 = N3::all();
        return view('surat.n3', compact('n3'));
    }

    public function create()
    {
        return view('n3.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pengantin_pria' => 'required|string|max:255',
            'nama_pengantin_wanita' => 'required|string|max:255',
            'tanggal_persetujuan' => 'required|date',
            'status_persetujuan' => 'required|in:disetujui,belum disetujui',
        ]);

        N3::create($request->all());

        return redirect()->route('birth-certificates.index')->with('success', 'Data berhasil disimpan.');
    }

    public function show($id)
    {
        $n3 = N3::find($id);
        return view('n3.show', compact('n3'));
    }

    public function edit($id)
    {
        $n3 = N3::find($id);
        return view('n3.edit', compact('n3'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pengantin_pria' => 'required|string|max:255',
            'nama_pengantin_wanita' => 'required|string|max:255',
            'tanggal_persetujuan' => 'required|date',
            'status_persetujuan' => 'required|in:disetujui,belum disetujui',
        ]);

        $n3 = N3::find($id);
        $n3->update($request->all());

        return redirect()->route('n3.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $n3 = N3::find($id);
        $n3->delete();

        return redirect()->route('n3.index')->with('success', 'Data berhasil dihapus.');
    }
}
