<?php

namespace App\Http\Controllers;

use App\Models\N2;
use Illuminate\Http\Request;

class N2Controller extends Controller
{
    public function index()
    {
        $n2 = N2::all();
        return view('surat.n2', compact('n2'));
    }

    public function create()
    {
        return view('n2.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'asal_daerah' => 'required|string|max:255',
            'status_verifikasi' => 'required|in:disetujui,belum disetujui',
        ]);

        N2::create($request->all());

        return redirect()->route('birth-certificates.index')->with('success', 'Data berhasil disimpan.');
    }

    public function show($id)
    {
        $n2 = N2::find($id);
        return view('n2.show', compact('n2'));
    }

    public function edit($id)
    {
        $n2 = N2::find($id);
        return view('n2.edit', compact('n2'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'asal_daerah' => 'required|string|max:255',
            'status_verifikasi' => 'required|in:disetujui,belum disetujui',
        ]);

        $n2 = N2::find($id);
        $n2->update($request->all());

        return redirect()->route('n2.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $n2 = N2::find($id);
        $n2->delete();

        return redirect()->route('n2.index')->with('success', 'Data berhasil dihapus.');
    }
}
