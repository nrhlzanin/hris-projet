{{-- resources/views/sign-in.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In - HRIS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;600;700;900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-inter bg-white min-h-screen h-screen w-screen m-0 p-0 overflow-hidden">
    <div class="flex h-full w-full">
        {{-- Left Image Section --}}
        <div class="w-1/2 h-full relative">
            <a href="{{ route('welcome') }}"
                class="absolute top-4 left-4 bg-blue-500 text-white px-4 py-2 rounded-full shadow-lg hover:bg-blue-600 flex items-center justify-center z-10">
                <span class="text-xl">&#8592;</span>
            </a>
            <img src="{{ asset('img/Login.png') }}" alt="HRIS Illustration" class="w-full h-full object-cover">
        </div>

        {{-- Right Form Section --}}
        <div class="w-1/2 h-screen overflow-y-auto flex items-center justify-center p-10 bg-white">

            <div class="w-full max-w-md">
                <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center space-x-2">
                        <img src="{{ asset('img/logo/Logo HRIS-1.png') }}" alt="HRIS Logo" class="h-8">
                    </div>
                    <a href="{{ route('sign.in') }}" class="text-blue-600 font-semibold hover:underline">Try for
                        free!</a>
                </div>

                <h1 class="text-3xl font-bold mb-2">Sign In</h1>
                <p class="mb-6 text-gray-700">Welcome back to HRIS cmlabs! Manage everything with ease.</p>

                <form class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium mb-1">Email</label>
                        <input type="email" placeholder="Enter your email"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Password</label>
                        <input type="password" placeholder="Enter your password"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div class="flex items-center text-sm justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember" class="mr-2">
                            <label for="remember" class="cursor-pointer">Remember me</label>
                        </div>
                        <a href="{{ route('forgot.password') }}" class="text-blue-600 font-semibold hover:underline">
                            Forgot your password?
                        </a>
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-green-600 text-white font-bold py-2 rounded">SIGN IN</button>
                    <button type="button"
                        class="w-full bg-gray-400 hover:bg-blue-500 text-white font-bold py-2 rounded">Sign up with
                        Google</button>
                    <a href="{{ route('sign.in.employee') }}">
                        <button type="button"
                            class="w-full bg-gray-400 hover:bg-blue-500 text-white font-bold py-2 rounded">
                            Sign up with Employee
                        </button>
                    </a>

                    <p class="text-center text-sm mt-4">Don’t have an account yet? <a href="{{ route('get.started') }}"
                            class="text-blue-600 underline">Sign up now and get started</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
