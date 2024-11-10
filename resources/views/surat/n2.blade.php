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

<div style="background-color: #C4D7FF;padding: 15px;border-radius:15px;">
    <h3 style="font-size: 20px;margin-bottom: 15px;">Informasi Pengajuan Verifikasi</h3>
    <p><strong>Persyaratan Verifikasi:</strong></p>
    <ul style="padding: 15px;">
        <li>Pastikan semua data yang diajukan sudah lengkap dan benar.</li>
        <li>Unggah dokumen-dokumen yang diperlukan.</li>
    </ul>

    <p><strong>Catatan:</strong></p>
    <ul style="padding: 15px">
        <li>Data yang diajukan akan diproses dalam waktu 1-3 hari kerja setelah verifikasi.</li>
    </ul>

    <p><strong>Penting!</strong></p>
    <p style="padding: 15px;">Hanya satu pengajuan yang dapat diproses dalam satu waktu.</p>
</div>

<div class="container p-6 mx-auto bg-white rounded-lg">
    <form action="{{ route('n2.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h2 class="mb-6 font-mono text-2xl font-semibold">Data Pengajuan Verifikasi</h2>
        <div class="p-4 border rounded-lg">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <!-- Nama -->
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="nama" id="nama" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <!-- Tanggal Lahir -->
                <div class="mb-4">
                    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir <em class="text-xl text-red-500">*</em></label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <!-- Asal Daerah -->
                <div class="mb-4">
                    <label for="asal_daerah" class="block text-sm font-medium text-gray-700">Asal Daerah <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="asal_daerah" id="asal_daerah" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <!-- Status Verifikasi -->
                <div class="mb-4">
                    <label for="status_verifikasi" class="block text-sm font-medium text-gray-700">Status Verifikasi <em class="text-xl text-red-500">*</em></label>
                    <select name="status_verifikasi" id="status_verifikasi" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled selected>Pilih Status Verifikasi</option>
                        <option value="pending">Pending</option>
                        <option value="approved">Disetujui</option>
                        <option value="rejected">Ditolak</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="px-4 py-2 mt-4 text-white bg-blue-500 rounded-lg">Ajukan Verifikasi</button>
    </form>
</div>
@endsection
