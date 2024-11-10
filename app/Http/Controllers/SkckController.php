<?php

namespace App\Http\Controllers;

use App\Models\Skck;
use Illuminate\Http\Request;

class SkckController extends Controller
{
    /**
     * Tampilkan form pengajuan SKCK.
     */
    public function index()
    {
        $skcks = SKCK::all();
        return view('surat.skck', compact('skcks'));
    }

    /**
     * Simpan data pengajuan SKCK ke database.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan dari form
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:10',
            'tempat_tgl_lahir' => 'required|date',
            'bangsa_agama' => 'required|string|max:255',
            'nik' => 'required|string|max:16',  // NIK biasanya 16 digit
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'email' => 'required|email|max:255',
            'file_pdf' => 'required|mimes:pdf|max:2048',
        ]);

        // upload pdf
        if ($request->hasFile('file_pdf')) {
            $fileName = time() . '_' . $request->file('file_pdf')->getClientOriginalName();
            $filePath = $request->file('file_pdf')->storeAs('uploads', $fileName, 'public');
            $validated['file_pdf'] = '/storage/' . $filePath;
        }

        // Simpan data yang sudah divalidasi ke database
        Skck::create($validated);

        // Redirect ke halaman lain (misalnya halaman sukses atau daftar SKCK)
        return redirect()->route('birth-certificates.index')->with('success', 'Pengajuan SKCK berhasil disimpan!');
    }

    /**
     * Tampilkan halaman sukses setelah pengajuan berhasil.
     */
    public function success()
    {
        return view('skck.success');  // Pastikan kamu membuat file view untuk sukses
    }
}
