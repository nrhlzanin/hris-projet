{{-- resources/views/auth/sign-in.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In - HRIS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;600;700;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-inter bg-white min-h-screen h-screen w-screen m-0 p-0 overflow-hidden">
    <div class="flex h-full w-full">
        {{-- Left Image Section --}}
        <div class="w-1/2 h-full relative">
            <a href="{{ route('welcome') }}"
            class="absolute top-4 left-4 bg-[#2D8EFF] text-white px-4 py-2 rounded-full shadow-lg hover:bg-[#1E3A5F] flex items-center justify-center z-10">
                <span class="text-xl">&#8592;</span>
            </a>
            <img src="{{ asset('img/Login.png') }}" alt="HRIS Illustration" class="w-full h-full object-cover">
        </div>

        {{-- Right Form Section --}}
        <div class="w-1/2 h-screen overflow-y-auto flex items-center justify-center p-10 bg-white">
            <div class="w-full max-w-md">
                <div class="flex justify-between items-center mb-6">
                    <img src="{{ asset('img/logo/Logo HRIS-1.png') }}" alt="HRIS Logo" class="h-8">
                    <a href="{{ route('sign.up') }}" class="text-blue-600 font-semibold hover:underline">Try for free!</a>
                </div>

                <h1 class="text-3xl font-bold mb-2">Sign In</h1>
                <p class="mb-6 text-gray-700">Welcome back to HRIS cmlabs! Manage everything with ease.</p>

                {{-- Form Submission --}}
                <form method="POST" action="{{ route('sign.in') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium mb-1" for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter your email"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1" for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter your password"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    </div>

                    <div class="flex items-center text-sm justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember" name="remember" class="mr-2">
                            <label for="remember" class="cursor-pointer">Remember me</label>
                        </div>
                        <a href="{{ route('forgot.password') }}" class="text-blue-600 font-semibold hover:underline">
                            Forgot your password?
                        </a>
                    </div>

                    <button type="submit"
                        class="w-full bg-[#2D8EFF] hover:bg-[#1E3A5F] text-white font-bold py-2 rounded">SIGN IN</button>

                    <a href="{{ route('google.redirect') }}">
                        <button type="button"
                            class="w-full bg-[#595959] hover:bg-[#2D8EFF] text-white font-bold py-2 rounded flex items-center justify-center gap-2">
                            <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="h-5 w-5">
                            Sign in with Google
                        </button>
                    </a>

                    <a href="{{ route('sign.in.id') }}">
                        <div class="w-full bg-[#595959] hover:bg-[#2D8EFF] text-white font-bold py-2 rounded text-center mt-2">
                            Sign in with Employee ID
                        </div>
                    </a>

                    <p class="text-center text-sm mt-4">Don’t have an account yet? 
                        <a href="{{ route('sign.up') }}" class="text-blue-600 hover:underline">Sign up now and get started</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
