<?php

namespace App\Http\Controllers;

use App\Models\Kehilangan;
use Illuminate\Http\Request;

class KehilanganController extends Controller
{
    public function index()
    {
        // Get all kehilangan records
        $kehilangan = Kehilangan::all();
        return view('surat.kehilangan', compact('kehilangan'));
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'tempat_tgl_lahir' => 'required|date',
            'bangsa_agama' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kehilangan' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'email' => 'required|email|max:255',
            'file_pdf' => 'required|mimes:pdf|max:2048', // Validasi untuk file PDF
        ]);

        // Upload file PDF
        $filePath = $request->file('file_pdf')->store('kehilangan_pdfs', 'public');

        // Create the kehilangan record using the request data and file path
        Kehilangan::create([
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nik' => $request->nik,
            'tempat_tgl_lahir' => $request->tempat_tgl_lahir,
            'bangsa_agama' => $request->bangsa_agama,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'kehilangan' => $request->kehilangan,
            'tanggal_surat' => $request->tanggal_surat,
            'email' => $request->email,
            'file_pdf' => $filePath, // Simpan path file ke database
        ]);

        // Redirect with success message
        return redirect()->route('birth-certificates.index')->with('success', 'Surat kehilangan berhasil dibuat.');
    }
}
