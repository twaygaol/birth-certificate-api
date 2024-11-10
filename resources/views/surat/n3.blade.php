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
    <form action="{{ route('n3.store') }}" method="POST">
        @csrf

        <h2 class="mb-6 font-mono text-2xl font-semibold">Data Pengantin</h2>
        <div class="p-4 border rounded-lg">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <!-- Nama Pengantin Pria -->
                <div class="mb-4">
                    <label for="nama_pengantin_pria" class="block text-sm font-medium text-gray-700">Nama Pengantin Pria <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="nama_pengantin_pria" id="nama_pengantin_pria" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <!-- Nama Pengantin Wanita -->
                <div class="mb-4">
                    <label for="nama_pengantin_wanita" class="block text-sm font-medium text-gray-700">Nama Pengantin Wanita <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="nama_pengantin_wanita" id="nama_pengantin_wanita" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <!-- Tanggal Persetujuan -->
                <div class="mb-4">
                    <label for="tanggal_persetujuan" class="block text-sm font-medium text-gray-700">Tanggal Persetujuan <em class="text-xl text-red-500">*</em></label>
                    <input type="date" name="tanggal_persetujuan" id="tanggal_persetujuan" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <!-- Status Persetujuan -->
                <div class="mb-4">
                    <label for="status_persetujuan" class="block text-sm font-medium text-gray-700">Status Persetujuan <em class="text-xl text-red-500">*</em></label>
                    <select name="status_persetujuan" id="status_persetujuan" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled selected>Pilih Status Persetujuan</option>
                        <option value="pending">Pending</option>
                        <option value="approved">Disetujui</option>
                        <option value="rejected">Ditolak</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="px-4 py-2 mt-4 text-white bg-blue-500 rounded-lg">Ajukan Persetujuan</button>
    </form>
</div>
@endsection
