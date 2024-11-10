<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome! - Medan Petisah</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Smooth dropdown transition */
        #navbar {
            transition: max-height 0.3s ease-in-out;
            overflow: hidden;
        }

        /* Hide the mobile menu by default */
        #mobile-menu {
            display: none; /* Keep it hidden until toggled */
        }

        /* Full-width for mobile menu */
        #mobile-menu.show {
            display: block; /* Display block for mobile menu */
            flex-direction: column; /* Stack items vertically */
        }
    </style>
</head>
<body class="">
    <header class="container p-6 shadow-md ">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="h-30 w-56">
                <img src="{{ asset('petisah.png') }}" alt="Meterai Elektronik" class="object-contain w-3/4">
            </div>
            <!-- Toggle button for mobile -->
            <button id="menu-toggle" class="block p-2 text-blue-600 lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <nav id="navbar" class="hidden lg:flex lg:space-x-6">
                <a href="/" class="flex items-center space-x-2 text-gray-600 hover:text-blue-600">
                    <i class="fas fa-home"></i>
                    <span>Beranda</span>
                </a>

                @if(Auth::check())
                    <!-- Menu Surat with Dropdown -->
                    <!-- Modal Trigger Button -->
                    <a href="#" id="modalButton" class="flex items-center space-x-2 text-gray-600 hover:text-blue-600">
                        <i class="text-red-600 fas fa-envelope"></i>
                        <span>Buat Surat</span>
                    </a>

                    <!-- Modal -->
                    <div id="modal" class="fixed inset-0 left-0 z-50 flex items-center justify-center hidden w-full bg-gray-900 bg-opacity-50">
                        <div class="p-4 bg-white rounded-lg shadow-lg w-96">
                            <div class="flex items-center justify-between">
                                <h2 class="text-lg font-semibold">Layanan surat yang tersedia</h2>
                                <button id="closeModalButton" class="text-gray-600 hover:text-red-600 focus:outline-none">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>

                            <!-- Modal Content -->
                            <div class="mt-4">
                                <!-- SKCK -->
                                <a href="{{ route('skck.index') }}" class="block px-4 py-2 text-black hover:bg-gray-100">
                                    SKCK
                                </a>
                                <!-- Meninggal Dunia -->
                                <a href="{{ route('meninggaldunia.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Meninggal Dunia
                                </a>
                                <!-- Domisili -->
                                <a href="{{ route('domisili.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Domisili
                                </a>
                                <!-- Kehilangan -->
                                <a href="{{ route('kehilangan.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Kehilangan
                                </a>
                                <!-- Kurang Mampu -->
                                <a href="{{ route('kurang-mampu.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Kurang Mampu
                                </a>
                                {{-- n1 --}}
                                <a href="{{ route('n1.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    N1
                                </a>
                                {{-- n2 --}}
                                <a href="{{ route('n2.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    N2
                                </a>
                                {{-- n3 --}}
                                <a href="{{ route('n3.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    N3
                                </a>
                                {{-- n4 --}}
                                <a href="{{ route('n4.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    N4
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Akta Kelahiran -->
                    <a href="{{ route('birth-certificates.index') }}" class="flex items-center space-x-2 text-gray-600 hover:text-blue-600">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>dashboard</span>
                    </a>

                    <!-- Logout -->
                    <form action="{{ route('logout') }}" method="POST" class="flex items-center space-x-2">
                        @csrf
                        <button type="submit" class="flex items-center px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                @else
                    <!-- Show Login if user is not authenticated -->
                    <a href="{{ route('login') }}" class="flex items-center px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Login</span>
                    </a>
                @endif
            </nav>
        </div>
    </header>

    <!-- Mobile navigation menu -->
    <div id="mobile-menu" class="p-4 space-y-4 bg-white shadow-md lg:hidden">
        <nav class="flex flex-col space-y-4">
            <a href="/" class="text-gray-600 hover:text-blue-600"><i class="fas fa-home"></i> Beranda</a>

            @if(Auth::check())
                <!-- Menu Surat with Dropdown (for mobile) -->
                <div class="relative group">
                    <button id="mobileDropdownButton" class="flex items-center space-x-2 text-gray-600 hover:text-blue-600">
                        <i class="fas fa-envelope"></i>
                        <span>Surat</span>
                        <i class="fas fa-caret-down"></i>
                    </button>
                    <div id="mobileDropdownMenu" class="absolute left-0 z-10 hidden pt-2 group-hover:block">
                        <div class="w-48 bg-white border border-gray-200 rounded-lg shadow-lg">
                            <a href="{{ route('skck.index') }}" class="block px-4 py-2 text-black hover:bg-gray-100">
                                SKCK
                            </a>
                            <!-- Meninggal Dunia -->
                            <a href="{{ route('meninggaldunia.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                Meninggal Dunia
                            </a>
                            <!-- Domisili -->
                            <a href="{{ route('domisili.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                Domisili
                            </a>
                            <!-- Kehilangan -->
                            <a href="{{ route('kehilangan.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                Kehilangan
                            </a>
                            <!-- Kurang Mampu -->
                            <a href="{{ route('kurang-mampu.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                Kurang Mampu
                            </a>
                            {{-- n1 --}}
                            <a href="{{ route('n1.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                N1
                            </a>
                            {{-- n2 --}}
                            <a href="{{ route('n2.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                N2
                            </a>
                            {{-- n3 --}}
                            <a href="{{ route('n3.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                N3
                            </a>
                            {{-- n4 --}}
                            <a href="{{ route('n4.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                N4
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Akta Kelahiran -->
                <a href="{{ route('birth-certificates.index') }}" class="flex items-center space-x-2 text-gray-600 hover:text-blue-600">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>

                <!-- Logout -->
                <form action="{{ route('logout') }}" method="POST" class="flex items-center space-x-2">
                    @csrf
                    <button type="submit" class="flex items-center px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            @else
                <!-- Show Login if user is not authenticated -->
                <a href="{{ route('login') }}" class="flex items-center px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Login</span>
                </a>
            @endif
        </nav>
    </div>

    <main class="container mx-auto">
        @yield('content')
    </main>

    <footer class="p-4 mt-12 text-center bg-gray-100">
        <p class="text-gray-600">&copy; 2024 medan petisah. All rights reserved.</p>
    </footer>

    <script>
        // Toggle mobile navigation menu
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('show');
        });

        // Dropdown menu logic for desktop and mobile
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');
        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        // Mobile dropdown menu
        const mobileDropdownButton = document.getElementById('mobileDropdownButton');
        const mobileDropdownMenu = document.getElementById('mobileDropdownMenu');
        mobileDropdownButton.addEventListener('click', () => {
            mobileDropdownMenu.classList.toggle('hidden');
        });
    </script>
     <script>
        // Get the modal and buttons
        const modal = document.getElementById('modal');
        const modalButton = document.getElementById('modalButton');
        const closeModalButton = document.getElementById('closeModalButton');

        // Open modal when button is clicked
        modalButton.addEventListener('click', function () {
            modal.classList.remove('hidden');
        });

        // Close modal when close button is clicked
        closeModalButton.addEventListener('click', function () {
            modal.classList.add('hidden');
        });

        // Close modal when clicking outside the modal
        window.addEventListener('click', function (e) {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });
    </script>

</body>
</html>
