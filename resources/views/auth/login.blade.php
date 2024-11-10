<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Medan petisah</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    @vite('resources/css/app.css') <!-- Assuming you are using Vite for bundling -->
</head>
<body class="bg-gray-100 font-inter">
    <div class="flex items-center justify-center min-h-screen">
        <div class="flex w-3/4 overflow-hidden bg-white rounded-lg shadow-lg md:w-1/2 lg:w-1/3">
            <!-- Left Side Image -->
            <div class="flex items-center justify-center w-1/3 bg-blue-600">
                {{-- <div class="p-4">
                    <img src="{{ asset('images/loginAkata.png') }}" alt="Login" class="object-cover h-full">
                </div> --}}
            </div>
            <!-- Right Side Form -->
            <div class="w-2/3 p-8">

                <div class="h-16 w-80">
                    <img src="{{ asset('petisah.png') }}" alt="Meterai Elektronik" class="object-contain w-3/4">
                </div>
                <h2 class="text-2xl font-semibold text-center text-gray-700">Silahkan<span class="text-blue-500"> Login</span></h2>
                <form action="{{ route('login.submit') }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mb-4">
                        <label class="block mb-2 text-sm text-gray-600" for="email">Email</label>
                        <input class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email" required>
                        @error('email')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm text-gray-600" for="password">Password</label>
                        <input class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" type="password" name="password" id="password" placeholder="********" required>
                        @error('password')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="w-full py-2 font-bold text-white transition duration-200 bg-blue-500 rounded-lg shadow-md hover:bg-blue-600">Login</button>
                </form>
                <p class="mt-4 text-sm text-center text-gray-600">Belum punya akun? <a href="{{ route('register') }}" class="text-blue-500">Daftar Sekarang</a></p>
            </div>
        </div>
    </div>
</body>
</html>
