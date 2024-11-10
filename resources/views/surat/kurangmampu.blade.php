{{-- resources/views/kurang_mampu/create.blade.php --}}
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

<div class="container p-6 mx-auto bg-white rounded-lg shadow-md">
    <form action="{{ route('kurang-mampu.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h2 class="mb-6 font-mono text-2xl font-semibold text-gray-800">Surat Keterangan Kurang Mampu</h2>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            {{-- Data Pemohon --}}
            <div class="p-4 border rounded-lg bg-gray-50">
                <h3 class="mb-4 text-xl font-semibold text-gray-700">Data Pemohon</h3>

                <div class="mb-4">
                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap <em class="text-red-500">*</em></label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}" class="block w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin <em class="text-red-500">*</em></label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="block w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="tempat_tgl_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir <em class="text-red-500">*</em></label>
                    <input type="date" name="tempat_tgl_lahir" id="tempat_tgl_lahir" value="{{ old('tempat_tgl_lahir') }}" class="block w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan <em class="text-red-500">*</em></label>
                    <input type="text" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan') }}" class="block w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="tempat_tinggal" class="block text-sm font-medium text-gray-700">Tempat tiggal <em class="text-red-500">*</em></label>
                    <input type="text" name="tempat_tinggal" id="tempat_tinggal" value="{{ old('tempat_tinggal') }}" class="block w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="tempat_sekolah" class="block text-sm font-medium text-gray-700">Tempat Sekolah <em class="text-red-500">*</em></label>
                    <input type="text" name="tempat_sekolah" id="tempat_sekolah" value="{{ old('tempat_sekolah') }}" class="block w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="nim" class="block text-sm font-medium text-gray-700">NIM <em class="text-red-500">*</em></label>
                    <input type="text" name="nim" id="nim" value="{{ old('nim') }}" class="block w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            {{-- Data Orang Tua --}}
            <div class="p-4 border rounded-lg bg-gray-50">
                <h3 class="mb-4 text-xl font-semibold text-gray-700">Data Orang Tua</h3>

                <div class="mb-4">
                    <label for="nama_ayah" class="block text-sm font-medium text-gray-700">Nama Ayah <em class="text-red-500">*</em></label>
                    <input type="text" name="nama_ayah" id="nama_ayah" value="{{ old('nama_ayah') }}" class="block w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="nama_ibu" class="block text-sm font-medium text-gray-700">Nama Ibu <em class="text-red-500">*</em></label>
                    <input type="text" name="nama_ibu" id="nama_ibu" value="{{ old('nama_ibu') }}" class="block w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="pekerjaan_ayah" class="block text-sm font-medium text-gray-700">Pekerjaan Ayah <em class="text-red-500">*</em></label>
                    <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" class="block w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="pekerjaan_ibu" class="block text-sm font-medium text-gray-700">Pekerjaan Ibu <em class="text-red-500">*</em></label>
                    <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" class="block w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="tanggungan_anak" class="block text-sm font-medium text-gray-700">Tanggungan Anak <em class="text-red-500">*</em></label>
                    <input type="number" name="tanggungan_anak" id="tanggungan_anak" value="{{ old('tanggungan_anak') }}" class="block w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="penghasilan_ayah" class="block text-sm font-medium text-gray-700">Penghasilan Ayah <em class="text-red-500">*</em></label>
                    <input type="number" name="penghasilan_ayah" id="penghasilan_ayah" value="{{ old('penghasilan_ayah') }}" class="block w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="penghasilan_ibu" class="block text-sm font-medium text-gray-700">Penghasilan Ibu <em class="text-red-500">*</em></label>
                    <input type="number" name="penghasilan_ibu" id="penghasilan_ibu" value="{{ old('penghasilan_ibu') }}" class="block w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="tanggal_surat" class="block text-sm font-medium text-gray-700">Tanggal Surat <em class="text-red-500">*</em></label>
                    <input type="date" name="tanggal_surat" id="tanggal_surat" value="{{ old('tanggal_surat') }}" class="block w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email <em class="text-red-500">*</em></label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="block w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="file_pdf" class="block text-sm font-medium text-gray-700">Unggah File sesuai unformasi | Bentuk PDF max 2MB  <em class="text-xl text-red-500">*</em></label>
                    <input type="file" name="file_pdf" id="file_pdf" value="{{ old('file_pdf') }}" accept="application/pdf" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

            </div>
        </div>

        <div class="mt-6 text-center">
            <button type="submit" class="px-6 py-3 text-white bg-blue-600 rounded-md shadow-lg hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Simpan
            </button>
        </div>
    </form>
</div>

@endsection
