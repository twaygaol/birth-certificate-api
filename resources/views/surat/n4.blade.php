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

<div class="container p-6 mx-auto bg-white rounded-lg">
    <form action="{{ route('n4.store') }}" method="POST">
        @csrf

        <h2 class="mb-6 font-mono text-2xl font-semibold">Data Keluarga</h2>
        <div class="p-4 border rounded-lg">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <!-- Nama Ayah -->
                <div class="mb-4">
                    <label for="nama_ayah" class="block text-sm font-medium text-gray-700">Nama Ayah <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="nama_ayah" id="nama_ayah" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <!-- Nama Ibu -->
                <div class="mb-4">
                    <label for="nama_ibu" class="block text-sm font-medium text-gray-700">Nama Ibu <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="nama_ibu" id="nama_ibu" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <!-- Hubungan -->
                <div class="mb-4">
                    <label for="hubungan" class="block text-sm font-medium text-gray-700">Hubungan <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="hubungan" id="hubungan" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <!-- Status Kewarganegaraan -->
                <div class="mb-4">
                    <label for="status_kewarganegaraan" class="block text-sm font-medium text-gray-700">Status Kewarganegaraan <em class="text-xl text-red-500">*</em></label>
                    <select name="status_kewarganegaraan" id="status_kewarganegaraan" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled selected>Pilih Status Kewarganegaraan</option>
                        <option value="WNI">WNI</option>
                        <option value="WNA">WNA</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="px-4 py-2 mt-4 text-white bg-blue-500 rounded-lg">Ajukan Data Keluarga</button>
    </form>
</div>
@endsection
