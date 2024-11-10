@extends('layouts.app')

@section('content')
{{-- <div class="grid items-center grid-cols-1 gap-8 md:grid-cols-2">
    <!-- Bagian gambar -->
    <div class="flex justify-center order-first md:order-last">
        <img src="{{ asset('medan_petisah.jpg') }}" alt="Kecamatan Medan Petisah" class="object-contain w-3/4">
    </div>

    <!-- Bagian teks -->
    <div>
        <h2 class="text-5xl font-bold leading-tight text-blue-900">Selamat Datang di Kecamatan Medan Petisah</h2>
        <p class="mt-4 text-2xl text-gray-700">
            Situs Resmi Pendaftaran Layanan Administrasi Kecamatan Medan Petisah
        </p>
        <p class="mt-2 text-gray-600">
            Pelayanan administrasi di Kecamatan Medan Petisah kini lebih mudah dan aman. Masyarakat bisa mengakses layanan ini kapan saja tanpa harus datang langsung ke kantor kecamatan.
        </p>
        <p class="mt-2 text-gray-600">
            Kami berkomitmen untuk memberikan pelayanan terbaik dengan proses yang cepat, aman, dan terpercaya. Dapatkan kemudahan dalam mengurus dokumen penting dengan sistem yang efisien dan praktis!
        </p>
        <h3 class="mt-6 text-xl font-semibold">Mengapa Memilih Layanan Kami?</h3>
        <ul class="mt-4 space-y-2">
            <li class="flex items-center space-x-2">
                <span class="text-blue-500">&#10003;</span>
                <span>Praktis</span>
            </li>
            <li class="flex items-center space-x-2">
                <span class="text-blue-500">&#10003;</span>
                <span>Efisien</span>
            </li>
            <li class="flex items-center space-x-2">
                <span class="text-blue-500">&#10003;</span>
                <span>Aman & Terpercaya</span>
            </li>
        </ul>
        <a href="#" class="inline-block px-6 py-3 mt-6 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
            <i class="fas fa-sign-in-alt"></i> Daftar Sekarang
        </a>
    </div>
</div> --}}

<main>
      <div
        class="relative flex items-center content-center justify-center pt-16 pb-32"
        style="min-height: 75vh;"
      >
<!-- GAMBAR DESA -->
        <div
          class="absolute top-0 w-full h-full bg-center bg-cover"
          style='background-image: url("/binjai.jpg");'
        >
          <span
            id="blackOverlay"
            class="absolute w-full h-full bg-gray-900 opacity-75"
          ></span>
        </div>
        <div class="container relative mx-auto">
        <div class="flex flex-wrap items-center justify-center">
            <div class="w-full px-4 mx-auto text-center lg:w-6/12" style="margin:0 60px;">
                <div class="">
                    <h1 class="text-4xl font-semibold text-white">
                        Kelurahan <span class="text-red-500"> Sei Putih Timur II</span>
                    </h1>
                    <div class="items-center flex-grow font-serif lg:flex lg:bg-transparent lg:shadow-none ">
                        <p class="mt-4 font-serif text-lg text-gray-300">
                            Pelayanan administrasi di kelurahan Sei Putih Timur II kini lebih mudah dan aman. Masyarakat bisa mengakses layanan ini kapan saja tanpa harus datang langsung ke kantor kelurahan.
                        </p>
                    </div>

                </div>
            </div>
        </div>

        </div>
        <div
          class="absolute bottom-0 left-0 right-0 top-auto w-full overflow-hidden pointer-events-none"
          style="height: 70px;"
        >
          <svg
            class="absolute bottom-0 overflow-hidden"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
            version="1.1"
            viewBox="0 0 2560 100"
            x="0"
            y="0"
          >
            <polygon
              class="text-gray-300 fill-current"
              points="2560 0 2560 100 0 100"
            ></polygon>
          </svg>
        </div>
      </div>
      <section class="pb-20 -mt-24 bg-gray-300">
        <div class="container px-4 mx-auto">
          <div class="flex flex-wrap">
            <div class="w-full px-4 pt-6 text-center lg:pt-12 md:w-4/12">
              <div
                class="relative flex flex-col w-full min-w-0 mb-8 break-words bg-gray-100 rounded-lg shadow-lg"
              >
                <div class="flex-auto px-4 py-5">
                  <div
                    class="inline-flex items-center justify-center w-12 h-12 p-3 mb-5 text-center text-white bg-red-400 rounded-full shadow-lg"
                  >
                    <i class="fas fa-award"></i>
                  </div>
                  <h6 class="text-xl font-semibold">Buat surat</h6>
                  <p class="mt-2 mb-4 text-gray-600">
                    Pembuatan surat melalui online
                  </p>
                </div>
              </div>
            </div>
            <div class="w-full px-4 text-center md:w-4/12">
              <div
                class="relative flex flex-col w-full min-w-0 mb-8 break-words bg-gray-200 rounded-lg shadow-lg"
              >
                <div class="flex-auto px-4 py-5">
                  <div
                    class="inline-flex items-center justify-center w-12 h-12 p-3 mb-5 text-center text-white bg-blue-400 rounded-full shadow-lg"
                  >
                    <i class="fas fa-retweet"></i>
                  </div>
                  <h6 class="text-xl font-semibold">Proses Verifikasi</h6>
                  <p class="mt-2 mb-4 text-gray-600">
                  Tunggu sampai laporan Anda di verifikasi.
                  </p>
                </div>
              </div>
            </div>
            <div class="w-full px-4 pt-6 text-center md:w-4/12">
              <div
                class="relative flex flex-col w-full min-w-0 mb-8 break-words bg-gray-200 rounded-lg shadow-lg"
              >
                <div class="flex-auto px-4 py-5">
                  <div
                    class="inline-flex items-center justify-center w-12 h-12 p-3 mb-5 text-center text-white bg-green-400 rounded-full shadow-lg"
                  >
                    <i class="fas fa-fingerprint"></i>
                  </div>
                  <h6 class="text-xl font-semibold">Tindak Lanjut</h6>
                  <p class="mt-2 mb-4 text-gray-600">
                  Laporan Anda sedang dalam tindak lanjut.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="flex flex-wrap items-center mt-32">
            <div class="w-full px-4 ml-auto mr-auto md:w-5/12">
              <div
                class="inline-flex items-center justify-center w-16 h-16 p-3 mb-6 text-center text-gray-600 bg-gray-100 rounded-full shadow-lg"
              >
                <i class="text-xl fas fa-users"></i>
              </div>
              <h3 class="mb-2 text-3xl font-semibold leading-normal">
                Sistem Pembuatan Surat
              </h3>
              <p
                class="mt-4 mb-4 text-lg font-light leading-relaxed text-gray-700"
              >
              Pelayanan administrasi di Kelurahan Sei Putih Timur II kini lebih mudah dan aman. Masyarakat bisa mengakses layanan ini kapan saja tanpa harus datang langsung ke kantor kelurahan.
              </p>
              <p
                class="mt-0 mb-4 text-lg font-light leading-relaxed text-gray-700"
              >
              Kami berkomitmen untuk memberikan pelayanan terbaik dengan proses yang cepat, aman, dan terpercaya. Dapatkan kemudahan dalam mengurus dokumen penting dengan sistem yang efisien dan praktis!
              </p>
            </div>
            <div class="w-full px-4 ml-auto mr-auto md:w-4/12">
              <div
                class="relative flex flex-col w-full min-w-0 mb-6 break-words bg-gray-100 rounded-lg shadow-lg"
              >
                <img
                  alt="..."
                  src="{{ asset('profile.jpeg')}}"
                  class="align-middle rounded-t-lg "
                />
                <blockquote class="relative p-8 mb-4">
                  <svg
                    preserveAspectRatio="none"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 583 95"
                    class="absolute left-0 block w-full"
                    style="height: 95px; top: -94px;"
                  >
                    <polygon
                      points="-30,95 583,95 583,65"
                      class="text-gray-100 fill-current"
                    ></polygon>
                  </svg>
                  <h4 class="text-xl font-bold text-black">
                    Kecamatan Medan Petisah
                  </h4>
                  <p class="mt-2 font-light text-black text-md">
                    Kecamatan Medan Petisah, Medan Kota
                  </p>
                </blockquote>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="relative py-20">
        <div
          class="absolute top-0 left-0 right-0 bottom-auto w-full -mt-20 overflow-hidden pointer-events-none"
          style="height: 80px;"
        >
          <svg
            class="absolute bottom-0 overflow-hidden"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
            version="1.1"
            viewBox="0 0 2560 100"
            x="0"
            y="0"
          >
            <polygon
              class="text-white fill-current"
              points="2560 0 2560 100 0 100"
            ></polygon>
          </svg>
        </div>
        <div class="container px-4 mx-auto">
          <div class="flex flex-wrap items-center">
            <div class="w-full px-4 ml-auto mr-auto md:w-4/12">
              <!-- GAMBAR DESA -->
              <img
                alt="..."
                class="w-full rounded-lg shadow-lg"
                src="{{asset('profile2.jpeg')}}"
              />
            </div>
            <div class="w-full px-4 ml-auto mr-auto md:w-5/12">
              <div class="md:pr-12">
                <div
                  class="inline-flex items-center justify-center w-16 h-16 p-3 mb-6 text-center text-pink-600 bg-gray-300 rounded-full shadow-lg"
                >
                  <i class="text-xl fas fa-rocket"></i>
                </div>
                <h3 class="text-3xl font-semibold">Ruang Lingkup Pembuatan Surat</h3>
                <p class="mt-4 text-lg leading-relaxed text-gray-600">
                    Pelayanan administrasi di Kelurahan Sei Putih Timur II kini lebih mudah dan aman. Masyarakat bisa mengakses layanan ini kapan saja tanpa harus datang langsung ke kantor Kelurahan.
                </p>
                <ul class="mt-6 list-none">
                  <li class="py-2">
                    <div class="flex items-center">
                      <div>
                        <span
                          class="inline-block px-2 py-1 mr-3 text-xs font-semibold text-pink-600 uppercase bg-pink-200 rounded-full"
                          ><i class="fas fa-point"></i
                        ></span>
                      </div>
                      <div>
                        <h4 class="text-gray-600">
                        Surat Domisili
                        </h4>
                      </div>
                    </div>
                  </li>
                  <li class="py-2">
                    <div class="flex items-center">
                      <div>
                        <span
                          class="inline-block px-2 py-1 mr-3 text-xs font-semibold text-pink-600 uppercase bg-pink-200 rounded-full"
                          ><i class="fas fa-point"></i
                        ></span>
                      </div>
                      <div>
                        <h4 class="text-gray-600">
                        Surat Kurang Mampu
                        </h4>
                      </div>
                    </div>
                  </li>
                  <li class="py-2">
                    <div class="flex items-center">
                      <div>
                        <span
                          class="inline-block px-2 py-1 mr-3 text-xs font-semibold text-pink-600 uppercase bg-pink-200 rounded-full"
                          ><i class="fas fa-point"></i
                        ></span>
                      </div>
                      <div>
                        <h4 class="text-gray-600">
                        Surat Meninggal Dunia
                        </h4>
                      </div>
                    </div>
                  </li>
                  <li class="py-2">
                    <div class="flex items-center">
                      <div>
                        <span
                          class="inline-block px-2 py-1 mr-3 text-xs font-semibold text-pink-600 uppercase bg-pink-200 rounded-full"
                          ><i class="fas fa-point"></i
                        ></span>
                      </div>
                      <div>
                        <h4 class="text-gray-600">
                        Surat Kehilangan
                        </h4>
                      </div>
                    </div>
                  </li>
                  <li class="py-2">
                    <div class="flex items-center">
                      <div>
                        <span
                          class="inline-block px-2 py-1 mr-3 text-xs font-semibold text-pink-600 uppercase bg-pink-200 rounded-full"
                          ><i class="fas fa-point"></i
                        ></span>
                      </div>
                      <div>
                        <h4 class="text-gray-600">
                        Surat SKCK
                        </h4>
                      </div>
                    </div>
                  </li>
                  <li class="py-2">
                    <div class="flex items-center">
                      <div>
                        <span
                          class="inline-block px-2 py-1 mr-3 text-xs font-semibold text-pink-600 uppercase bg-gray-500 rounded-full"
                          ><i class="fas fa-point"></i
                        ></span>
                      </div>
                      <div>
                        <h4 class="text-gray-600">
                        Surat N1, N2, N3, N4
                        </h4>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="pt-20 pb-48">
        <div class="container px-4 mx-auto">
          <div class="flex flex-wrap justify-center mb-24 text-center">
            <div class="w-full px-4 lg:w-6/12">
              <h2 class="text-4xl font-semibold">Aktifitas <span class="text-red-600">Sepekan</span></h2>
              <p class="m-4 text-lg leading-relaxed text-gray-600">
                beberapa aktifitas yang di laksakan di Kelurahan Sei Putih Timur II
              </p>
            </div>
          </div>
          <div class="flex flex-wrap justify-center">
                    <div class="max-w-sm m-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img class="object-cover w-full h-48 rounded-t-lg" src="{{ asset('aktikel.png')}}" />
                        </a>
                        <div class="p-5">
                        <a href="#" class="hover:text-blue-500">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 hover:text-blue-500 dark:text-white">Pembukaan Pekan Olahraga Kota Medan ke- XIII Tahun 2023</h5>
                        </a>

                            <p class="mb-1 text-sm text-red-500">Jumat, 15 September 2023, 05:08:07</p>
                            <!-- Menampilkan tanggal dengan format tertentu -->
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Dalam rangka memeriahkan Pekan Olahraga Kota Medan ke-XIII Camat Medan Petisah beserta jajaran menghadiri dan mengikuti pembukaan Pekan Olahraga Kota Medan ke-XIII yang dilaksanakan pada hari Sabtu, 19 Agustus 2023 di Stadion Teladan.</p>
                        </div>
                    </div>
                    <div class="max-w-sm m-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img class="object-cover w-full h-48 rounded-t-lg" src="{{ asset('artikel23.png')}}" />
                        </a>
                        <div class="p-5">
                        <a href="#" class="hover:text-blue-500">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 hover:text-blue-500 dark:text-white">Program Pasar Keliling Yang Diselenggarakan PUD Pasar Kota Medan Bekerja Sama dengan Bank Mandiri di Kecamatan Medan Petisah</h5>
                        </a>

                            <p class="mb-1 text-sm text-red-500">Jumat, 15 September 2023, 05:04:12</p>
                            <!-- Menampilkan tanggal dengan format tertentu -->
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Dalam rangka memeriahkan Pekan Olahraga Kota Medan ke-XIII Camat Medan Petisah Dalam rangka memenuhi kebutuhan pokok masyarakat dengan harga yang terjangkau dan menjaga stabilitas harga bahan pokok di Kota Medan maka PUD Pasar Kota Medan Melaksanakan Pasar Murah Keliling di Beberapa Kecamatan yang ada di Kota Medan salah satunya Kecamatan Medan Petisah.</p>
                        </div>
                    </div>
                    <div class="max-w-sm m-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img class="object-cover w-full h-48 rounded-t-lg" src="{{ asset('artikel22.jpeg')}}" />
                        </a>
                        <div class="p-5">
                        <a href="#" class="hover:text-blue-500">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 hover:text-blue-500 dark:text-white">Gebyar Pendidikan Kota Medan Tahun 2023</h5>
                        </a>

                            <p class="mb-1 text-sm text-red-500">Selasa, 01 Agustus 2023, 04:48:42</p>
                            <!-- Menampilkan tanggal dengan format tertentu -->
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Kegiatan ini berlangsung dengan sangat meriah dengan menampilkan berbagai Marching Band Tingkat SD dan SMP, Penampilan Angklung dari Anak - Anak Paud Kota Medan serta ditambah dengan parade tarian kolosal oleh Siswa dan Siswi SMP di Kota Medan dengan peserta lebih kurang 2.000 penari.</p>
                        </div>
                    </div>
            </div>
        </div>
      </section>
      <section class="relative block pb-20 bg-gray-900" style="background-image: url('profile2.jpeg'); background-size: cover; background-position: center; position: relative;">
      <div class="absolute inset-0 bg-black opacity-75"></div>
        <div class="absolute top-0 left-0 right-0 bottom-auto w-full -mt-20 overflow-hidden pointer-events-none" style="height: 80px;">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-gray-900 fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    <div class="container relative z-10 flex flex-wrap items-center px-4 mx-auto lg:pt-24 lg:pb-64">
    <div class="w-full px-4 lg:w-6/12">
        <h2 class="text-4xl font-semibold text-white">Senang Melayani Anda</h2>
        <p class="mt-4 mb-4 text-lg leading-relaxed text-gray-300">
            Kami berkomitmen untuk memberikan pelayanan terbaik dengan proses yang cepat, aman, dan terpercaya. Dapatkan kemudahan dalam mengurus dokumen penting dengan sistem yang efisien dan praktis!
        </p>
        <ul class="mt-6 list-none">
                  <li class="py-2">
                    <div class="flex items-center">
                      <div>
                        <span
                          class="inline-block px-2 py-1 mr-3 text-xs font-semibold text-pink-600 uppercase bg-white rounded-full"
                          ><i class="fas fa-phone"></i
                        ></span>
                      </div>
                      <div>
                        <h4 class="text-gray-200">
                        +628-576108-8663
                        </h4>
                      </div>
                    </div>
                  </li>
                  <li class="py-2">
                    <div class="flex items-center">
                      <div>
                        <span
                          class="inline-block px-2 py-1 mr-3 text-xs font-semibold text-pink-600 uppercase bg-white rounded-full"
                          ><i class="fas fa-envelope"></i
                        ></span>
                      </div>
                      <div>
                        <h4 class="text-gray-200">
                        medanpetisah@gmail.com
                        </h4>
                      </div>
                    </div>
                  </li>
          </ul>
    </div><br>
    <div class="items-center flex-grow hidden w-full px-4 lg:w-6/12 lg:flex lg:bg-transparent lg:shadow-none">
        <!-- Tambahkan iframe untuk Google Maps di sini -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.646671579934!2d106.83124381537293!3d-6.214235195489498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a45c3b8a3db93%3A0xd1fcd0e3a16a9874!2sKabupaten%20Batubara%2C%20Sumatra%20Utara!5e0!3m2!1sen!2sid!4v1644383146553!5m2!1sen!2sid" width="650" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
  </div>

</section>



    </main>

{{-- @extends('footer') --}}



@endsection
