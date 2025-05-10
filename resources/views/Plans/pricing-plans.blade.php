<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel HRIS</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;600;700;900&display=swap"
        rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="font-inter min-h-screen bg-gradient-to-b from-white via-blue-100 to-blue-500 flex items-center justify-center">
    <!-- Pricing Plans Section -->
    <section class="py-20 text-center">
        <h2 class="py-3 text-5xl font-bold mb-10 text-gray-1000" style="text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);">
            HRIS Pricing Plans
        </h2>

        <p class="text-gray-800 mb-10">
            <span class="block">Choose the plan that best suits your business!</span>
            <span class="block">This HRIS offers both subscription and pay-as-you-go payment options,</span>
            <span class="block">available in the following packages:</span>
        </p>

        <!-- Toggle Buttons -->
        <div class="flex justify-center mt-6 mb-10">
            <div class="relative flex bg-white shadow-md rounded-full overflow-hidden w-80">
                <!-- Hidden Radio Inputs to Control Active State -->
                <input type="radio" name="tab" id="package" class="hidden peer/package" checked>
                <input type="radio" name="tab" id="seat" class="hidden peer/seat">

                <!-- Sliding Background -->
                <div
                    class="absolute top-0 left-0 h-full w-1/2 bg-[#1D395E] rounded-full transition-all duration-300 peer-checked/seat:translate-x-full">
                </div>

                <!-- Package Button -->
                <label for="package"
                    class="relative z-10 w-1/2 py-3 text-sm font-semibold text-center cursor-pointer transition-all peer-checked/seat:text-gray-700 peer-checked/package:text-white">
                    Package
                </label>

                <!-- Seat Button -->
                <label for="seat"
                    class="relative z-10 w-1/2 py-3 text-sm font-semibold text-center cursor-pointer transition-all peer-checked/package:text-gray-700 peer-checked/seat:text-white">
                    Seat
                </label>
            </div>
        </div>






        <!-- Pricing Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto px-6">
            <!-- Starter Plan with Linear Gradient -->
            <div class="bg-gradient-to-l from-[#1D395E] to-[#3C77C4] text-white rounded-xl shadow-lg p-8">
                <h3 class="text-2xl font-semibold text-left">Starter</h3>
                <p class="text-4xl font-bold text-left">Free</p>
                <!-- Horizontal Line (Divider) -->
                <hr class="border-t-2 border-white my-4">
                <ul class="mt-6 text-sm text-left list-disc list-inside space-y-2">
                    <li>GPS-based attendance validation</li>
                    <li>Employee data management</li>
                    <li>Leave and time-off request</li>
                    <li>Overtime management</li>
                    <li>Fixed work schedule management</li>
                    <li>Automatic fixed calculation</li>
                </ul>
                <button
                    class="mt-6 w-full bg-[#2D8DFE] text-white font-bold py-3 rounded-lg hover:bg-[#2278D2] transition">Current
                    Plan</button>
            </div>


            <!-- Lite Plan (Recommended) - Fixed to Match Image -->
            <div class="bg-[#2E2E3A] text-white rounded-xl shadow-lg p-8">
                <h3 class="text-2xl font-semibold text-left">Lite <span class="text-sm text-left">(Recommended)</span>
                </h3>
                <p class="text-4xl font-bold text-left">$15 <span class="text-lg text-left">/year</span></p>
                <!-- Horizontal Line (Divider) -->
                <hr class="border-t-2 border-white my-4">
                <ul class="mt-6 text-sm text-left list-disc list-inside space-y-2">
                    <li>All standard features</li>
                    <li>Clock-in clock-out attendance settings</li>
                    <li>Employee document management</li>
                    <li>Sick leave & time-out settings</li>
                    <li>Shift management</li>
                    <li>Site password protection</li>
                </ul>
                <a href="{{ route('choose.lite') }}"
                    class="mt-6 w-full bg-white text-blue-500 font-bold py-3 rounded-lg hover:bg-gray-200 transition block text-center">
                    Upgrade Plan
                </a>

            </div>

            <!-- Pro Plan -->
            <div class="bg-gradient-to-l from-[#7CA5BF] to-[#3A4D59] text-white rounded-xl shadow-lg p-8">
                <h3 class="text-2xl font-semibold text-left">Pro</h3>
                <p class="text-4xl font-bold text-left">$35 <span class="text-lg text-left">/year</span></p>
                <!-- Horizontal Line (Divider) -->
                <hr class="border-t-2 border-white my-4">
                <ul class="mt-6 text-sm text-left list-disc list-inside space-y-2">
                    <li>2 Projects</li>
                    <li>Client billing</li>
                    <li>Free staging</li>
                    <li>Code export</li>
                    <li>White labeling</li>
                    <li>Site Password protection</li>
                </ul>
                <a href="{{ route('choose.pro') }}"
                    class="mt-6 w-full bg-white text-blue-500 font-bold py-3 rounded-lg hover:bg-gray-200 transition block text-center">
                    Upgrade Plan
                </a>
            </div>
        </div>
    </section>
</body>

</html>
