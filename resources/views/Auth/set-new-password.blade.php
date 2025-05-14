{{-- resources/views/set-new-password.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Set New Password - HRIS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;600;700;900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-inter bg-gray-100 h-screen w-screen m-0 p-0 overflow-hidden">
    <div class="flex flex-col md:flex-row-reverse h-full w-full">
        
        {{-- Right Image Section (static) --}}
        <div class="w-full md:w-1/2 h-64 md:h-full relative">
            <img src="{{ asset('img/Forgot Passs.png') }}" alt="HRIS Illustration" class="w-full h-full object-cover">
        </div>

        {{-- Left Form Section (scrollable) --}}
        <div class="w-full md:w-1/2 h-full overflow-y-auto p-10 flex flex-col justify-center bg-white">
            
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold mb-2">Set new password</h1>
                <p class="text-gray-700">
                    Enter your new password below to complete the reset process.
                    Ensure it’s strong and secure.
                </p>
            </div>

            <form class="flex flex-col gap-6">
                <div>
                    <label class="block text-sm font-medium mb-1">Password</label>
                    <input type="password" placeholder="Enter your password"
                        class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Confirm Password</label>
                    <input type="password" placeholder="Confirm your password"
                        class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <a href="{{ route('password.update') }}">
                    <button type="button"
                        class="w-full bg-red-400 hover:bg-red-500 text-white font-bold py-2 rounded">
                        Reset password
                    </button>
                </a>

                <p class="text-center text-sm">
                    <a href="{{ route('sign.in') }}" class="text-blue-600 hover:underline">← Back to log in</a>
                </p>
            </form>
        </div>
    </div>
</body>

</html>
