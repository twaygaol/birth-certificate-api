<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeninggalDunia;

class MeninggalDuniaController extends Controller
{
    // Menampilkan halaman form input
    public function index()
    {
        $meninggal_dunia = MeninggalDunia::all();
        return view('surat.meninggaldunia', compact('meninggal_dunia'));
    }

    // Menyimpan data ke database
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'tempat_tgl_lahir' => 'required|date',
            'bangsa_agama' => 'required|string|max:255',
            'tempat_tinggal_akhir' => 'required|string|max:255',
            'hari_tanggal' => 'required|date',
            'pukul' => 'required|date_format:H:i',
            'sebab_meninggal' => 'required|string|max:255',
            'tempat_meninggal' => 'required|string|max:255',
            'dikebumikan' => 'required|string|max:255',
            'nama_pelapor' => 'required|string|max:255',
            'hubungan_pelapor' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'email' => 'required|email|max:255',
            'file_pdf' => 'required|mimes:pdf|max:2048', // Validasi untuk file PDF
        ]);

        // Upload file PDF
        $filePath = $request->file('file_pdf')->store('meninggal_dunia_pdfs', 'public');

        // Simpan data ke dalam model MeninggalDunia dengan path file PDF
        MeninggalDunia::create(array_merge($validatedData, [
            'file_pdf' => $filePath, // Simpan path file ke database
        ]));

        // Redirect dengan pesan sukses
        return redirect()->route('birth-certificates.index')->with('success', 'Data meninggal dunia berhasil disimpan!');
    }
}
