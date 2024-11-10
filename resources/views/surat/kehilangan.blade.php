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
    <form action="{{ route('kehilangan.store') }}" method="POST">
        @csrf

        <h2 class="mb-6 font-mono text-2xl font-semibold text-gray-800">Surat Kehilangan</h2>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div class="p-4 border rounded-lg shadow-sm bg-gray-50">
                <h3 class="mb-4 text-lg font-semibold text-gray-700">Data Pemohon</h3>

                <div class="mb-4">
                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('nama_lengkap') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin <em class="text-xl text-red-500">*</em></label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="nik" class="block text-sm font-medium text-gray-700">NIK <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="nik" id="nik" value="{{ old('nik') }}" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('nik') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="tempat_tgl_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir <em class="text-xl text-red-500">*</em></label>
                    <input type="date" name="tempat_tgl_lahir" id="tempat_tgl_lahir" value="{{ old('tempat_tgl_lahir') }}" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('tempat_tgl_lahir') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="bangsa_agama" class="block text-sm font-medium text-gray-700">Bangsa/Agama <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="bangsa_agama" id="bangsa_agama" value="{{ old('bangsa_agama') }}" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('bangsa_agama') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan') }}" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('pekerjaan') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('alamat') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="kehilangan" class="block text-sm font-medium text-gray-700">Kehilangan <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="kehilangan" id="kehilangan" value="{{ old('kehilangan') }}" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('kehilangan') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="tanggal_surat" class="block text-sm font-medium text-gray-700">Tanggal Surat <em class="text-xl text-red-500">*</em></label>
                    <input type="date" name="tanggal_surat" id="tanggal_surat" value="{{ old('tanggal_surat') }}" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('tanggal_surat') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email <em class="text-xl text-red-500">*</em></label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('email') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="file_pdf" class="block text-sm font-medium text-gray-700">Unggah File sesuai unformasi | Bentuk PDF max 2MB  <em class="text-xl text-red-500">*</em></label>
                    <input type="file" name="file_pdf" id="file_pdf" value="{{ old('file_pdf') }}" accept="application/pdf" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>


                <div class="mb-4">
                    <button type="submit" class="w-full p-2 mt-4 text-white bg-blue-500 rounded-md hover:bg-blue-700">Buat Surat Kehilangan</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
