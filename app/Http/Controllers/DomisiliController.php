<?php

namespace App\Http\Controllers;

use App\Models\Domisili;
use Illuminate\Http\Request;

class DomisiliController extends Controller
{
    public function index()
    {
        $domisili = Domisili::all();
        return view('surat.domisili', compact('domisili'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:20',
            'tempat_tgl_lahir' => 'required|date',
            'bangsa_agama' => 'required|string|max:255',
            'nik' => 'required|string|digits:16',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'email' => 'required|email|max:255',
            'file_pdf' => 'required|mimes:pdf|max:2048',
        ]);

        $filePath = $request->file('file_pdf')->store('domisili_pdfs', 'public');

        Domisili::create([
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_tgl_lahir' => $request->tempat_tgl_lahir,
            'bangsa_agama' => $request->bangsa_agama,
            'nik' => $request->nik,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'tanggal_surat' => $request->tanggal_surat,
            'email' => $request->email,
            'file_pdf' => $filePath,
        ]);

        return redirect()->route('birth-certificates.index')->with('success', 'Surat Domisili berhasil dibuat!');
    }

    public function show(Domisili $domisili)
    {
        //
    }

    public function edit(Domisili $domisili)
    {
        //
    }

    public function update(Request $request, Domisili $domisili)
    {
        //
    }

    public function destroy(Domisili $domisili)
    {
        //
    }
}
