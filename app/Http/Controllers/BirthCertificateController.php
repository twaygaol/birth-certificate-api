<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BirthCertificate;
use App\Models\Domisili;
use App\Models\Kehilangan;
use App\Models\KurangMampu;
use App\Models\MeninggalDunia;
use App\Models\Skck;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage; // Tambahkan ini



class BirthCertificateController extends Controller
{

    public function index()
    {
        // Ambil email user yang sedang login
        $email = auth()->user()->email;

        // Ambil surat berdasarkan email pengguna yang sedang login
        $skck = Skck::where('email', $email)->get()->map(function($item) {
            $item->jenis_surat = 'SKCK'; // Tandai jenis surat
            return $item;
        });

        $domisili = Domisili::where('email', $email)->get()->map(function($item) {
            $item->jenis_surat = 'Domisili'; // Tandai jenis surat
            return $item;
        });

        $kehilangan = Kehilangan::where('email', $email)->get()->map(function($item) {
            $item->jenis_surat = 'Kehilangan'; // Tandai jenis surat
            return $item;
        });

        $kurangMampu = KurangMampu::where('email', $email)->get()->map(function($item) {
            $item->jenis_surat = 'Surat Kurang Mampu'; // Tandai jenis surat
            return $item;
        });

        $meninggalDunia = MeninggalDunia::where('email', $email)->get()->map(function($item) {
            $item->jenis_surat = 'Surat Keterangan Meninggal Dunia'; // Tandai jenis surat
            return $item;
        });

        // Gabungkan semua jenis surat
        $surat = $skck->merge($domisili)
                    ->merge($kehilangan)
                    ->merge($kurangMampu)
                    ->merge($meninggalDunia);

        // Urutkan berdasarkan tanggal surat terbaru
        $surat = $surat->sortByDesc('tanggal_surat');

        // Kirim data surat ke view
        return view('birth-certificates.index', ['surat' => $surat]);
    }



    public function destroy($id)
    {
        try {
            $certificate = BirthCertificate::findOrFail($id);
            if ($certificate->file1) {
                \Storage::disk('public')->delete($certificate->file1);
            }
            if ($certificate->file2) {
                \Storage::disk('public')->delete($certificate->file2);
            }
            $certificate->delete();

            return redirect()->route('birth-certificates.index')->with('success', 'Akta kelahiran berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus Akta Kelahiran. Silakan coba lagi.');
        }
    }

    public function cetakSurat($id, $jenis_surat)
    {
        // Pilih jenis surat yang tepat
        switch ($jenis_surat) {
            case 'SKCK':
                $surat = Skck::findOrFail($id);
                $view = 'cetak.skck';
                break;
            case 'Domisili':
                $surat = Domisili::findOrFail($id);
                $view = 'cetak.domisili';
                break;
            case 'Kehilangan':
                $surat = Kehilangan::findOrFail($id);
                $view = 'cetak.kehilangan';
                break;
            case 'Surat Kurang Mampu':
                $surat = KurangMampu::findOrFail($id);
                $view = 'cetak.kurangmampu';
                break;
            case 'Surat Keterangan Meninggal Dunia':
                $surat = MeninggalDunia::findOrFail($id);
                $view = 'cetak.meninggal';
                break;
            default:
                abort(404, 'Jenis surat tidak ditemukan');
        }

        // Mengembalikan view yang sesuai
        return view($view, ['surat' => $surat]);
    }

}
