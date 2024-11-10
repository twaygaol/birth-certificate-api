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
    <p><strong>Persyaratan pelaporan akta kelahiran:</strong></p>
    <ul style="padding: 15px;">
        <li>Mengisi form pelaporan kelahiran.</li>
        <li>Unggah:
            <ul style="padding: 15px;">
                <li>(a) Surat keterangan lahir dari Rumah Sakit/Puskesmas/dokter/bidan/desa, dukcapil.</li>
                <li>(b) Akta perkawinan/surat nikah orang tua.</li>
                <li>(c) KK.</li>
                <li>(d) KTP-el orang tua.</li>
                <li>(e) KTP-el 2 orang saksi.</li>
                <li>(f) Surat keterangan kehilangan dari kepolisian (khusus untuk pengajuan hilang).</li>
            </ul>
        </li>
    </ul>

    <p><strong>Catatan:</strong></p>
    <ul style="padding: 15px">
        <li>Pastikan dokumen yang Anda unggah berupa scan/foto dokumen ASLI dan dapat TERBACA dengan jelas.</li>
        <li>Standar waktu pengerjaan 3 (tiga) hari kerja terhitung sejak data pelaporan divalidasi dan dinyatakan lengkap dan benar.</li>
        <li>Khusus untuk dokumen akta nikah, pastikan foto suami-istri dan data pada akta nikah difoto/discan dalam 1 dokumen.</li>
    </ul>

    <p><strong>Penting!</strong></p>
    <p style="padding: 15px;">Setiap pengguna hanya dapat mengajukan satu (1) pengajuan untuk setiap layanan yang ada sampai pengajuan sebelumnya ditolak / terselesaikan. Mohon untuk mengisi data Anda dengan benar dan jelas sesuai dengan persyaratan yang tertera.</p>
</div>

<div class="container p-6 mx-auto bg-white rounded-lg ">
    <form action="{{ route('birth-certificates.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

    <h2 class="mb-6 font-mono text-2xl font-semibold">Data Akun Sistem Terdaftar</h2>
    <div class="p-4 border rounded-lg">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div class="mb-4">
                <label for="akun" class="block text-sm font-medium text-gray-700">Nama Akun <em class="text-xl text-red-500">*</em></label>
                <input type="text" name="akun" id="akun" value="{{ old('akun') }}" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email Akun <em class="text-xl text-red-500">*</em></label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div>
    </div>

    <h2 class="mt-5 mb-6 font-mono text-2xl font-semibold">Input Data Akta Kelahiran</h2>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <!-- Data Anak -->
            <div class="p-4 border rounded-lg">
                <h3 class="mb-4 font-semibold">Data Anak</h3>
                <div class="mb-4">
                    <label for="certificate_number" class="block text-sm font-medium text-gray-700">Nomor Akta Kelahiran <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="certificate_number" id="certificate_number" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="baby_name" class="block text-sm font-medium text-gray-700">Nama Bayi <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="baby_name" id="baby_name" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin <em class="text-xl text-red-500">*</em></label>
                    <select name="gender" id="gender" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled selected>Pilih Jenis Kelamin <em class="text-xl text-red-500">*</em></option>
                        <option value="male">Laki-laki</option>
                        <option value="female">Perempuan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="birth_date" class="block text-sm font-medium text-gray-700">Tanggal Lahir <em class="text-xl text-red-500">*</em></label>
                    <input type="date" name="birth_date" id="birth_date" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="birth_time" class="block text-sm font-medium text-gray-700">Jam Lahir <em class="text-xl text-red-500">*</em></label>
                    <input type="time" name="birth_time" id="birth_time" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="birth_place" class="block text-sm font-medium text-gray-700">Tempat Lahir <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="birth_place" id="birth_place" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="hospital_name" class="block text-sm font-medium text-gray-700">Nama Rumah Sakit <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="hospital_name" id="hospital_name" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="birth_order" class="block text-sm font-medium text-gray-700">Urutan Kelahiran <em class="text-red-500">(anak ke (1, 2, 3, 4))</em></label>
                    <input type="number" name="birth_order" id="birth_order" min="1" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <!-- Data Orang Tua -->
            <div class="p-4 border rounded-lg">
                <h2 class="mt-5 mb-6 font-mono text-xl font-semibold">Data Orang Tua</h2>
                <h4 class="mb-2 font-medium">Data Ayah</h4>
                <div class="mb-4">
                    <label for="father_name" class="block text-sm font-medium text-gray-700">Nama Ayah <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="father_name" id="father_name" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="father_nik" class="block text-sm font-medium text-gray-700">
                        NIK Ayah <em class="text-red-500">(nik terdiri 16 angka)</em>
                    </label>
                    <input type="text" name="father_nik" id="father_nik" required
                           class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <p id="nik-error" class="hidden text-red-500">NIK harus terdiri dari 16 angka.</p>
                </div>
                <div class="mb-4">
                    <label for="father_birthplace" class="block text-sm font-medium text-gray-700">Tempat Lahir Ayah <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="father_birthplace" id="father_birthplace" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="father_birthdate" class="block text-sm font-medium text-gray-700">Tanggal Lahir Ayah <em class="text-xl text-red-500">*</em></label>
                    <input type="date" name="father_birthdate" id="father_birthdate" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="father_job" class="block text-sm font-medium text-gray-700">Pekerjaan Ayah <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="father_job" id="father_job" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <h4 class="mb-2 font-medium">Data Ibu</h4>
                <div class="mb-4">
                    <label for="mother_name" class="block text-sm font-medium text-gray-700">Nama Ibu <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="mother_name" id="mother_name" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="mother_nik" class="block text-sm font-medium text-gray-700">NIK Ibu <em class="text-xl text-red-500">*</em><em class="text-red-500">(nik terdiri 16 angka)</em></label>
                    <input type="text" name="mother_nik" id="mother_nik" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="mother_birthplace" class="block text-sm font-medium text-gray-700">Tempat Lahir Ibu <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="mother_birthplace" id="mother_birthplace" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="mother_birthdate" class="block text-sm font-medium text-gray-700">Tanggal Lahir Ibu <em class="text-xl text-red-500">*</em></label>
                    <input type="date" name="mother_birthdate" id="mother_birthdate" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="mother_job" class="block text-sm font-medium text-gray-700">Pekerjaan Ibu <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="mother_job" id="mother_job" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
        </div>


        <div class="gap-4 p-4 mt-5 border rounded-lg">
           <h2 class="mt-5 mb-6 font-mono text-xl font-semibold">Alamat</h2>
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Alamat <em class="text-xl text-red-500">*</em></label>
                <input type="text" name="address" id="address" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
            <div class="mb-4">
                <label for="village" class="block text-sm font-medium text-gray-700">Desa <em class="text-xl text-red-500">*</em></label>
                <input type="text" name="village" id="village" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="district" class="block text-sm font-medium text-gray-700">Kecamatan <em class="text-xl text-red-500">*</em></label>
                <input type="text" name="district" id="district" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="city" class="block text-sm font-medium text-gray-700">Kota <em class="text-xl text-red-500">*</em></label>
                <input type="text" name="city" id="city" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
            <div class="mb-4">
                <label for="province" class="block text-sm font-medium text-gray-700">Provinsi <em class="text-xl text-red-500">*</em></label>
                <input type="text" name="province" id="province" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="postal_code" class="block text-sm font-medium text-gray-700">Kode Pos <em class="text-xl text-red-500">*</em></label>
                <input type="text" name="postal_code" id="postal_code" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div>
       </div>
       <div class="p-4 mt-5 border rounded-lg">
           <h2 class="mt-5 mb-6 font-mono text-xl font-semibold">Saksi</h2>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div class="mb-4">
                    <label for="witness1_name" class="block text-sm font-medium text-gray-700">Nama Saksi 1 <em class="text-xl text-red-500">*</em></label>
                    <input type="text" name="witness1_name" id="witness1_name" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="witness1_nik" class="block text-sm font-medium text-gray-700">NIK Saksi 1 <em class="text-xl text-red-500">*</em><em class="text-red-500">(nik terdiri 16 angka)</em></label>
                    <input type="text" name="witness1_nik" id="witness1_nik" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="witness2_name" class="block text-sm font-medium text-gray-700">Nama Saksi 2 </label>
                    <input type="text" name="witness2_name" id="witness2_name" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="witness2_nik" class="block text-sm font-medium text-gray-700">NIK Saksi 2<em class="text-red-500">(nik terdiri 16 angka)</em></label>
                    <input type="text" name="witness2_nik" id="witness2_nik" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
       </div>


       <div class="p-4 mt-5 border rounded-lg">
           <h2 class="mt-5 mb-6 font-mono text-xl font-semibold">Riwayat Pendaftar</h2>
            <div class="mb-4">
                <label for="registration_date" class="block font-medium text-gray-700">Tanggal Pendaftaran <em class="text-xl text-red-500">*</em></label>
                <input type="date" name="registration_date" id="registration_date" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="registrant_name" class="block text-sm font-medium text-gray-700">Nama Pendaftar <em class="text-xl text-red-500">*</em></label>
                <input type="text" name="registrant_name" id="registrant_name" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="registrant_relation" class="block text-sm font-medium text-gray-700">Hubungan Pendaftar <em class="text-xl text-red-500">*</em></label>
                <input type="text" name="registrant_relation" id="registrant_relation" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="registrant_nik" class="block text-sm font-medium text-gray-700">NIK Pendaftar <em class="text-xl text-red-500">*</em> <em class="text-red-500">(nik terdiri 16 angka)</em></label>
                <input type="text" name="registrant_nik" id="registrant_nik" required class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
       </div>


       <div class="p-4 mt-5 border rounded-lg">
        <h2 class="mt-5 mb-6 font-mono text-xl font-semibold">Upload File yang Dibutuhkan</h2>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div class="mb-4">
                <label for="file1" class="block text-sm font-medium text-gray-700">Upload File 1 <em class="text-red-500"> (format:jpg,pdf,jpeg,png | max:2mb)</em></label>
                <input type="file" name="file1" id="file1" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" accept=".pdf,.jpg,.jpeg,.png" required>
            </div>

            <div class="mb-4">
                <label for="file2" class="block text-sm font-medium text-gray-700">Upload File 2 <em class="text-red-500"> (format:jpg,pdf,jpeg,png | max:2mb)</em></label>
                <input type="file" name="file2" id="file2" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" accept=".pdf,.jpg,.jpeg,.png" required>
            </div>
        </div>
    </div>

        <div class="mt-6">
            <button type="submit" class="w-full px-4 py-2 font-semibold text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700">
                Simpan Data
            </button>
        </div>
    </form>
</div>
@endsection

<script>
    document.getElementById('father_nik').addEventListener('input', function () {
        const nikInput = this.value;
        const errorMessage = document.getElementById('nik-error');

        // Cek panjang NIK
        if (nikInput.length !== 16 || isNaN(nikInput)) {
            errorMessage.classList.remove('hidden'); // Tampilkan pesan error
        } else {
            errorMessage.classList.add('hidden'); // Sembunyikan pesan error
        }
    });
</script>
