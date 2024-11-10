<?php

namespace App\Http\Controllers;

use App\Models\KurangMampu;
use Illuminate\Http\Request;

class KurangMampuController extends Controller
{

    public function index()
    {
        $kurang_mampu = KurangMampu::all();
        return view('surat.kurangmampu', compact('kurang_mampu'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'tempat_tgl_lahir' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'tempat_sekolah' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'tempat_tinggal' => 'required|string|max:255',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'tanggungan_anak' => 'required|integer',
            'penghasilan_ayah' => 'required|integer',
            'penghasilan_ibu' => 'required|integer',
            'tanggal_surat' => 'required|date',
            'email' => 'required|email|max:255',
            'file_pdf' => 'required|mimes:pdf|max:2048', // Validasi untuk file PDF
        ]);

        // Upload file PDF
        $filePath = $request->file('file_pdf')->store('kurang_mampu_pdfs', 'public');

        // Simpan data ke dalam database dengan path file PDF
        KurangMampu::create(array_merge($validated, [
            'file_pdf' => $filePath, // Simpan path file ke database
        ]));

        // Redirect dengan pesan sukses
        return redirect()->route('birth-certificates.index')->with('success', 'Surat Keterangan Kurang Mampu berhasil disimpan!');
    }
}
