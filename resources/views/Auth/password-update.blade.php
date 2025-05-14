{{-- resources/views/password-update.blade.php --}}
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
            <img src="{{ asset('img/Forgot Passs.png') }}" alt="HRIS Illustration" class="w-full h-full object-cover">
        </div>

        {{-- Left Form Section (scrollable) --}}
        <div class="w-full md:w-1/2 h-full overflow-y-auto p-10 flex flex-col justify-center bg-white">
            {{-- Email Icon --}}
            <div class="flex justify-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16" viewBox="0 0 48 48">
                    <g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4">
                        <path fill="#2f88ff" stroke="#000"
                            d="M24 4L29.2533 7.83204L35.7557 7.81966L37.7533 14.0077L43.0211 17.8197L41 24L43.0211 30.1803L37.7533 33.9923L35.7557 40.1803L29.2533 40.168L24 44L18.7467 40.168L12.2443 40.1803L10.2467 33.9923L4.97887 30.1803L7 24L4.97887 17.8197L10.2467 14.0077L12.2443 7.81966L18.7467 7.83204L24 4Z" />
                        <path stroke="#fff" d="M17 24L22 29L32 19" />
                    </g>
                </svg>
            </div>

            {{-- Title and Description --}}
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold mb-2">Your password has been
                    successfully reset</h1>
                <p class="text-gray-700"> You can log in with your new password. If you encounter any issues,
                    please contact support !</p>
            </div>

            {{-- Button --}}
            <a href="{{ route('sign.in') }}">
                <button type="button" class="w-full bg-green-400 hover:bg-green-500 text-white font-bold py-2 rounded">
                    Login Now
                </button>
            </a>
        </div>
    </div>
</body>

</html>
