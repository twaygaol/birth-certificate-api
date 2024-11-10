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
    <h3 style="font-size: 20px;margin-bottom: 15px;">Informasi Surat Domisili</h3>
    <p>Harap lengkapi form berikut untuk mengajukan permohonan Surat Domisili.</p>
</div>

<div class="container p-6 mx-auto bg-white rounded-lg ">
    <form action="{{ route('domisili.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h2 class="mb-6 font-mono text-2xl font-semibold">Input Data Surat Domisili</h2>
        <div class="p-4 border rounded-lg">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div class="mb-4">
                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin <em class="text-xl text-red-500">*</em></label>
                    <select name="jenis_kelamin" id="jenis_kelamin" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="tempat_tgl_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir <em class="text-xl text-red-500">*</em></label>
                    <input type="date" name="tempat_tgl_lahir" id="tempat_tgl_lahir" value="{{ old('tempat_tgl_lahir') }}" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="bangsa_agama" class="block text-sm font-medium text-gray-700">Bangsa/Agama <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="bangsa_agama" id="bangsa_agama" value="{{ old('bangsa_agama') }}" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="nik" class="block text-sm font-medium text-gray-700">NIK <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="nik" id="nik" value="{{ old('nik') }}" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan') }}" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
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
                    <input type="file" name="file_pdf" id="file_pdf"  accept="application/pdf" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>


                <div class="flex justify-end">
                    <button type="submit" class="h-10 p-2 mt-10 text-white transition duration-200 bg-blue-500 rounded-md hover:bg-blue-700">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
