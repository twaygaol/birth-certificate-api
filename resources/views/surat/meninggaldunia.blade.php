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
    <h3 style="font-size: 20px;margin-bottom: 15px;">Informasi!</h3>
    <p><strong>Persyaratan pelaporan surat keterangan meninggal dunia:</strong></p>
    <ul style="padding: 15px;">
        <li>Mengisi form pelaporan kematian.</li>
        <li>Unggah:
            <ul style="padding: 15px;">
                <li>(a) Surat keterangan kematian dari Rumah Sakit/Puskesmas/dokter.</li>
                <li>(b) Fotokopi KTP almarhum.</li>
                <li>(c) Fotokopi KK.</li>
                <li>(d) KTP-el pelapor (keluarga/saksi).</li>
                <li>(e) Akta kelahiran almarhum (jika ada).</li>
            </ul>
        </li>
    </ul>
</div>

<div class="container p-6 mx-auto bg-white rounded-lg">
    <form action="{{ route('meninggaldunia.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h2 class="mb-6 font-mono text-2xl font-semibold">Data Almarhum</h2>
        <div class="p-4 border rounded-lg">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div class="mb-4">
                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap Almarhum <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin <em class="text-xl text-red-500">*</em></label>
                    <select name="jenis_kelamin" id="jenis_kelamin" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="tempat_tgl_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir <em class="text-xl text-red-500">*</em></label>
                    <input type="date" name="tempat_tgl_lahir" id="tempat_tgl_lahir" value="{{ old('tempat_tgl_lahir') }}" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="bangsa_agama" class="block text-sm font-medium text-gray-700">Bangsa dan Agama <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="bangsa_agama" id="bangsa_agama" value="{{ old('bangsa_agama') }}" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="tempat_tinggal_akhir" class="block text-sm font-medium text-gray-700">Tempat Tinggal Terakhir <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="tempat_tinggal_akhir" id="tempat_tinggal_akhir" value="{{ old('tempat_tinggal_akhir') }}" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
        </div>

        <h2 class="mt-6 mb-6 font-mono text-2xl font-semibold">Data Kematian</h2>
        <div class="p-4 border rounded-lg">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div class="mb-4">
                    <label for="hari_tanggal" class="block text-sm font-medium text-gray-700">Hari dan Tanggal Kematian <em class="text-xl text-red-500">*</em></label>
                    <input type="date" name="hari_tanggal" id="hari_tanggal" value="{{ old('hari_tanggal') }}" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="pukul" class="block text-sm font-medium text-gray-700">Pukul Kematian <em class="text-xl text-red-500">*</em></label>
                    <input type="time" name="pukul" id="pukul" value="{{ old('pukul') }}" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="sebab_meninggal" class="block text-sm font-medium text-gray-700">Sebab Kematian <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="sebab_meninggal" id="sebab_meninggal" value="{{ old('sebab_meninggal') }}" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="tempat_meninggal" class="block text-sm font-medium text-gray-700">Tempat Kematian <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="tempat_meninggal" id="tempat_meninggal" value="{{ old('tempat_meninggal') }}" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="dikebumikan" class="block text-sm font-medium text-gray-700">Dikebumikan di <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="dikebumikan" id="dikebumikan" value="{{ old('dikebumikan') }}" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
        </div>

        <h2 class="mt-6 mb-6 font-mono text-2xl font-semibold">Data Pelapor</h2>
        <div class="p-4 border rounded-lg">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div class="mb-4">
                    <label for="nama_pelapor" class="block text-sm font-medium text-gray-700">Nama Pelapor <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="nama_pelapor" id="nama_pelapor" value="{{ old('nama_pelapor') }}" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="hubungan_pelapor" class="block text-sm font-medium text-gray-700">Hubungan Pelapor dengan Almarhum <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="hubungan_pelapor" id="hubungan_pelapor" value="{{ old('hubungan_pelapor') }}" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="tanggal_surat" class="block text-sm font-medium text-gray-700">Tanggal Surat <em class="text-xl text-red-500">*</em></label>
                    <input type="date" name="tanggal_surat" id="tanggal_surat" value="{{ old('tanggal_surat') }}" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email <em class="text-xl text-red-500">*</em></label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="file_pdf" class="block text-sm font-medium text-gray-700">Unggah File sesuai unformasi | Bentuk PDF max 2MB  <em class="text-xl text-red-500">*</em></label>
                    <input type="file" name="file_pdf" id="file_pdf" value="{{ old('file_pdf') }}" accept="application/pdf" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

            </div>
        </div>

        <button type="submit" class="px-4 py-2 mt-6 font-bold text-white bg-blue-600 rounded hover:bg-blue-700">Ajukan Pelaporan</button>
    </form>
</div>
@endsection
