<?php

namespace App\Http\Controllers;

use App\Models\N4;
use Illuminate\Http\Request;

class N4Controller extends Controller
{
    public function index()
    {
        $n4 = N4::all();
        return view('surat.n4', compact('n4'));
    }

    public function create()
    {
        return view('n4.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'hubungan' => 'required|string|max:255',
            'status_kewarganegaraan' => 'required|string|max:255',
        ]);

        N4::create($request->all());

        return redirect()->route('birth-certificates.index')->with('success', 'Data berhasil disimpan.');
    }

    public function show($id)
    {
        $n4 = N4::find($id);
        return view('n4.show', compact('n4'));
    }

    public function edit($id)
    {
        $n4 = N4::find($id);
        return view('n4.edit', compact('n4'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'hubungan' => 'required|string|max:255',
            'status_kewarganegaraan' => 'required|string|max:255',
        ]);

        $n4 = N4::find($id);
        $n4->update($request->all());

        return redirect()->route('n4.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $n4 = N4::find($id);
        $n4->delete();

        return redirect()->route('n4.index')->with('success', 'Data berhasil dihapus.');
    }
}
