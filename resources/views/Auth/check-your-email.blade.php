{{-- resources/views/check-your-email.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Check Your Email - HRIS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;600;700;900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-inter bg-gray-100 h-screen w-screen m-0 p-0 overflow-hidden">
    <div class="flex flex-col md:flex-row-reverse h-full w-full">
        {{-- Right Image Section (tetap statis) --}}
        <div class="w-full md:w-1/2 h-64 md:h-full relative">
            <img src="{{ asset('img/Check Email.png') }}" alt="HRIS Illustration" class="w-full h-full object-cover">
        </div>

        {{-- Left Form Section (scrollable) --}}
        <div class="w-full md:w-1/2 h-full overflow-y-auto p-10 flex flex-col justify-center bg-white">
            {{-- Email Icon --}}
            <div class="flex justify-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="48" viewBox="0 0 256 193"
                    class="h-16 w-auto">
                    <path fill="#4285f4"
                        d="M58.182 192.05V93.14L27.507 65.077L0 49.504v125.091c0 9.658 7.825 17.455 17.455 17.455z" />
                    <path fill="#34a853"
                        d="M197.818 192.05h40.727c9.659 0 17.455-7.826 17.455-17.455V49.505l-31.156 17.837l-27.026 25.798z" />
                    <path fill="#ea4335"
                        d="m58.182 93.14l-4.174-38.647l4.174-36.989L128 69.868l69.818-52.364l4.669 34.992l-4.669 40.644L128 145.504z" />
                    <path fill="#fbbc04"
                        d="M197.818 17.504V93.14L256 49.504V26.231c0-21.585-24.64-33.89-41.89-20.945z" />
                    <path fill="#c5221f"
                        d="m0 49.504l26.759 20.07L58.182 93.14V17.504L41.89 5.286C24.61-7.66 0 4.646 0 26.23z" />
                </svg>
            </div>

            {{-- Title and Description --}}
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold mb-2">Check your email</h1>
                <p class="text-gray-700">
                    We sent a password reset link to your email (<strong>uremail@gmail.com</strong>) which is valid for
                    24 hours. Please check your inbox!
                </p>
            </div>

            {{-- Button --}}
            <a href="{{ route('set.new.password') }}">
                <button type="button"
                    class="w-full bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 rounded">
                    Open Gmail
                </button>
            </a>

            <p class="text-center text-sm mt-4">
                <a href="{{ route('sign.in') }}" class="text-blue-600 hover:underline">← Back to log in</a>
            </p>
        </div>

    </div>
</body>

</html>
