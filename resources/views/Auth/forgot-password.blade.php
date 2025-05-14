{{-- resources/views/forgot-password.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up - HRIS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;600;700;900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-inter bg-gray-100 h-screen w-screen m-0 p-0 overflow-hidden">
    <div class="flex flex-col md:flex-row-reverse h-full w-full">
        {{-- Right Image Section (tetap fix tinggi layar) --}}
        <div class="w-full md:w-1/2 h-64 md:h-full relative">
            <img src="{{ asset('img/Forgot Passs.png') }}" alt="HRIS Illustration" class="w-full h-full object-cover">
        </div>

        {{-- Left Form Section (scrollable jika content panjang) --}}
        <div class="w-full md:w-1/2 h-full overflow-y-auto p-10 flex flex-col justify-center bg-white">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold mb-2">Forgot Password</h1>
                <p class="text-gray-700">No worries. Enter your email address below, and we’ll send you a link to reset your password.</p>
            </div>

            {{-- Reset password button --}}
            <a href="{{ route('check.your.email') }}">
                <button type="button" class="w-full bg-red-400 hover:bg-red-500 text-white font-bold py-2 rounded">
                    Reset password
                </button>
            </a>

            {{-- Back to login --}}
            <p class="text-center text-sm mt-4">
                <a href="{{ route('sign.in') }}" class="text-blue-600 hover:underline">← Back to log in</a>
            </p>
        </div>
    </div>
</body>

</html>
