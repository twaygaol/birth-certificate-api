@extends('layouts.app')

@section('content')
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

<div style="background-color: #C4D7FF; padding: 15px; border-radius:15px;">
    <h3 style="font-size: 20px; margin-bottom: 15px;">Informasi Surat Keterangan Menikah!</h3>
    <p><strong>Persyaratan Pembuatan Surat Keterangan Menikah:</strong></p>
    <ul style="padding: 15px;">
        <li>Pengisian data pasangan calon pengantin pria dan wanita.</li>
        <li>Unggah dokumen-dokumen yang diperlukan:
            <ul style="padding: 15px;">
                <li>(a) KTP.</li>
                <li>(b) KK.</li>
                <li>(c) Akta Nikah atau Surat Pernikahan.</li>
            </ul>
        </li>
    </ul>

    <p><strong>Catatan:</strong></p>
    <ul style="padding: 15px">
        <li>Dokumen harus berupa scan/foto yang jelas dan dapat terbaca.</li>
        <li>Pengajuan akan diproses dalam waktu 1-3 hari kerja setelah dokumen dinyatakan lengkap.</li>
    </ul>
</div>

<div class="container p-6 mx-auto bg-white rounded-lg">
    <form action="{{ route('n1.store') }}" method="POST">
        @csrf

        <h2 class="mb-6 font-mono text-2xl font-semibold">Data Pengajuan Surat Keterangan Menikah</h2>
        <div class="p-4 border rounded-lg">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <!-- Nama Calon Pengantin Pria -->
                <div class="mb-4">
                    <label for="nama_calon_pengantin_pria" class="block text-sm font-medium text-gray-700">Nama Calon Pengantin Pria <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="nama_calon_pengantin_pria" id="nama_calon_pengantin_pria" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Nama Calon Pengantin Wanita -->
                <div class="mb-4">
                    <label for="nama_calon_pengantin_wanita" class="block text-sm font-medium text-gray-700">Nama Calon Pengantin Wanita <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="nama_calon_pengantin_wanita" id="nama_calon_pengantin_wanita" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Tanggal Pernikahan -->
                <div class="mb-4">
                    <label for="tanggal_pernikahan" class="block text-sm font-medium text-gray-700">Tanggal Pernikahan <em class="text-xl text-red-500">*</em></label>
                    <input type="date" name="tanggal_pernikahan" id="tanggal_pernikahan" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Status Persetujuan -->
                <div class="mb-4">
                    <label for="status_persetujuan" class="block text-sm font-medium text-gray-700">Status Persetujuan <em class="text-xl text-red-500">*</em></label>
                    <select name="status_persetujuan" id="status_persetujuan" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled selected>Pilih Status Persetujuan</option>
                        <option value="approved">Disetujui</option>
                        <option value="rejected">Ditolak</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="px-4 py-2 mt-4 text-white bg-blue-500 rounded-lg">Ajukan Surat Keterangan Menikah</button>
    </form>
</div>
@endsection
