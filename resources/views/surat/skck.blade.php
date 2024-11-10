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
    <h3 style="font-size: 20px;margin-bottom: 15px;">Informasi SKCK!</h3>
    <p><strong>Persyaratan Pembuatan SKCK:</strong></p>
    <ul style="padding: 15px;">
        <li>Mengisi form pendaftaran SKCK.</li>
        <li>Unggah dokumen-dokumen yang diperlukan:
            <ul style="padding: 15px;">
                <li>(a) KTP.</li>
                <li>(b) KK.</li>
                <li>(c) Akta Kelahiran.</li>
                <li>(d) Foto terbaru ukuran 4x6.</li>
            </ul>
        </li>
    </ul>

    <p><strong>Catatan:</strong></p>
    <ul style="padding: 15px">
        <li>Dokumen harus berupa scan/foto yang jelas dan dapat terbaca.</li>
        <li>Pengajuan akan diproses dalam waktu 1-3 hari kerja setelah dokumen dinyatakan lengkap.</li>
    </ul>

    <p><strong>Penting!</strong></p>
    <p style="padding: 15px;">Hanya satu pengajuan per layanan yang dapat diajukan sampai pengajuan sebelumnya ditolak atau terselesaikan.</p>
</div>

<div class="container p-6 mx-auto bg-white rounded-lg">
    <form action="{{ route('skck.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h2 class="mb-6 font-mono text-2xl font-semibold">Data Pengajuan SKCK</h2>
        <div class="p-4 border rounded-lg">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <!-- Nama -->
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="nama" id="nama" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <!-- Jenis Kelamin -->
                <div class="mb-4">
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin <em class="text-xl text-red-500">*</em></label>
                    <select name="jenis_kelamin" id="jenis_kelamin" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="male">Laki-laki</option>
                        <option value="female">Perempuan</option>
                    </select>
                </div>
                <!-- Tempat & Tanggal Lahir -->
                <div class="mb-4">
                    <label for="tempat_tgl_lahir" class="block text-sm font-medium text-gray-700">Tempat & Tanggal Lahir <em class="text-xl text-red-500">*</em></label>
                    <input type="date" name="tempat_tgl_lahir" id="tempat_tgl_lahir" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <!-- Bangsa & Agama -->
                <div class="mb-4">
                    <label for="bangsa_agama" class="block text-sm font-medium text-gray-700">Bangsa & Agama <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="bangsa_agama" id="bangsa_agama" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <!-- NIK -->
                <div class="mb-4">
                    <label for="nik" class="block text-sm font-medium text-gray-700">NIK <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="nik" id="nik" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <!-- Pekerjaan -->
                <div class="mb-4">
                    <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="pekerjaan" id="pekerjaan" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <!-- Alamat -->
                <div class="mb-4">
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="alamat" id="alamat" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <!-- Tanggal Surat -->
                <div class="mb-4">
                    <label for="tanggal_surat" class="block text-sm font-medium text-gray-700">Tanggal Surat <em class="text-xl text-red-500">*</em></label>
                    <input type="date" name="tanggal_surat" id="tanggal_surat" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email <em class="text-xl text-red-500">*</em></label>
                    <input type="email" name="email" id="email" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="file_pdf" class="block text-sm font-medium text-gray-700">Unggah File sesuai unformasi | Bentuk PDF max 2MB  <em class="text-xl text-red-500">*</em></label>
                    <input type="file" name="file_pdf" id="file_pdf" accept="application/pdf" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
        </div>

        <button type="submit" class="px-4 py-2 mt-4 text-white bg-blue-500 rounded-lg">Ajukan SKCK</button>
    </form>
</div>
@endsection
