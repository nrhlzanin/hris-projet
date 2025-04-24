{{-- resources/views/get-started.blade.php --}}
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

<body class="font-inter bg-gray-100 min-h-screen flex items-center justify-center">
    <div
        class="bg-white rounded-md shadow-lg w-full max-w-5xl overflow-hidden flex flex-col-reverse md:flex-row-reverse">
        {{-- Right Image Section --}}
        <div class="w-full md:w-1/2 h-64 md:h-auto relative">
            <img src="/Img/hris-illustration.svg" alt="HRIS Illustration" class="w-full h-full object-cover">
        </div>

        {{-- Left Form Section --}}
        <div class="w-full md:w-1/2 p-10 flex flex-col justify-center">
            {{-- Title and Description Centered --}}
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold mb-2">Link Expired</h1>
                <p class="text-gray-700">The password reset link has expired.
                    Please request a new link to reset your password.</p>
            </div>

            {{-- Form --}}
            <a href="{{ route('sign.in') }}">
                <button type="button" class="w-full bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 rounded">
                    Back to login
                </button>
            </a>
        </div>
    </div>
</body>

</html>
