{{-- resources/views/get-started.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up - HRIS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;600;700;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-inter bg-gray-100 m-0 p-0">
    <div class="flex flex-col md:flex-row h-screen w-screen overflow-auto bg-white">
        {{-- Left Image Section --}}
        <div class="w-full md:w-1/2 h-64 md:h-full relative">
            <a href="{{ route('welcome') }}"
                class="absolute top-4 left-4 bg-blue-500 text-white px-4 py-2 rounded-full shadow-lg hover:bg-blue-600 flex items-center justify-center z-10">
                <span class="text-xl">&#8592;</span>
            </a>
            <img src="{{ asset('img/Sign Up.png') }}" alt="HRIS Illustration" class="w-full h-full object-cover">
        </div>

        {{-- Right Form Section --}}
        <div class="w-full md:w-1/2 p-6 md:p-10 flex items-start justify-center overflow-auto">
            <div class="w-full max-w-md">
                <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center space-x-2">
                        <img src="{{ asset('img/logo/Logo HRIS-1.png') }}" alt="HRIS Logo" class="h-8">
                    </div>
                    <a href="{{ route('sign.in') }}" class="text-blue-600 font-semibold hover:underline">Login here!</a>
                </div>

                <h1 class="text-3xl font-bold mb-2">Sign Up</h1>
                <p class="mb-6 text-gray-700">Create your account and streamline your employee management.</p>

                {{-- Sign Up Form --}}
                <form action="{{ route('sign.up.post') }}" method="POST" class="space-y-5">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">First Name</label>
                            <input type="text" name="first_name" placeholder="Enter your first name" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Last Name</label>
                            <input type="text" name="last_name" placeholder="Enter your last name" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Email</label>
                        <input type="email" name="email" placeholder="Enter your email" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Password</label>
                        <input type="password" name="password" placeholder="Enter your password" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Confirm Password</label>
                        <input type="password" name="password_confirmation" placeholder="Enter your confirm password" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div class="flex items-center text-sm">
                        <input type="checkbox" id="terms" class="mr-2">
                        <label for="terms">I agree with the <a href="#" class="font-bold underline">terms</a> of use of HRIS</label>
                    </div>

                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 rounded">SIGN UP</button>
                </form>

                {{-- Google Sign Up --}}
                <a href="{{ route('google.redirect') }}" class="w-full bg-gray-400 hover:bg-blue-500 text-white font-bold py-2 rounded text-center block mt-4">Sign up with Google</a>

                <p class="text-center text-sm mt-4">Already have an account? <a href="{{ route('sign.in') }}" class="text-blue-600 underline">Sign in here</a></p>
            </div>
        </div>
    </div>
</body>

</html>
