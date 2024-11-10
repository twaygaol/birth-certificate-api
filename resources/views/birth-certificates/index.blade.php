@extends('layouts.app')

@section('content')
<div class="container p-4 mx-auto">
    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                title: 'Sukses!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if (session('error'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                title: 'Gagal!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'Coba Lagi'
            });
        </script>
    @endif

    <!-- Tabel Riwayat Surat -->
    @if($surat->isEmpty())
        <p>Tidak ada surat yang ditemukan untuk pengguna ini.</p>
    @else
        <div class="overflow-x-auto">
            <div class="mb-5 text-2xl font-semibold font-italic">
                <h1>Riwayat Pembuatan Surat</h1>
            </div>
            <table class="min-w-full bg-white border border-gray-400 P-6 rounded-2xl">
                <thead class="font-mono font-semibold bg-gray-500 text-stone-800">
                    <tr>
                        <th class="px-4 py-2 border">Jenis Surat</th>
                        <th class="px-4 py-2 border">Tanggal Pengajuan</th>
                        <th class="px-4 py-2 border">Aksi</th> <!-- Kolom aksi -->
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($surat as $item)
                    <tr>
                        <td class="px-4 py-2 border">{{ $item->jenis_surat }}</td>
                        <td class="px-4 py-2 border">{{ $item->tanggal_surat }}</td>
                        <td class="px-4 py-2 border">
                            @if ($item->status == 'approved')
                            {{-- {{ route('surat.cetak', ['id' => $item->id, 'jenis_surat' => $item->jenis_surat]) }} --}}
                                <a href="{{ route('birth-certificates.cetak', ['id' => $item->id, 'jenis_surat' => $item->jenis_surat]) }}" class="p-10 px-4 py-2 text-white bg-blue-500 rounded">
                                    Cetak Surat
                                </a>
                            @elseif ($item->status == 'pending')
                                <span class="px-4 py-2 text-lg text-yellow-500">Proses</span>
                            @elseif ($item->status == 'rejected')
                                <span class="px-4 py-2 text-red-500">Ditolak</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
