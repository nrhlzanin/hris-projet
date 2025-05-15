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

<body class="font-inter bg-gradient-to-b from-white to-blue-400">
    <!-- Navbar -->
    <nav class="flex items-center justify-between px-8 py-4 shadow bg-white">
        <div class="flex items-center space-x-4">
            <img src="{{ asset('img/logo/Vector HRIS.png') }}" alt="Logo" class="h-8 w-4" />
            <ul class="flex space-x-8 text-sm font-medium text-gray-700">
                <li><a href="#" class="hover:text-blue-600">Home</a></li>
                <li><a href="#" class="hover:text-blue-600">Services</a></li>
                <li><a href="#" class="hover:text-blue-600">About</a></li>
                <li><a href="#" class="hover:text-blue-600">Blog</a></li>
            </ul>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('sign.in') }}"
                class="px-4 py-2 bg-gray-100 text-sm font-medium text-gray-700 rounded hover:bg-gray-200">Sign in →</a>
            <a href="{{ route('sign.up') }}"
                class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded hover:bg-blue-600">Get Started</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="px-8 py-16 text-left">
        <h1 class="max-w-4xl text-8xl font-inter font-black text-gray-900 leading-tight mb-10">Get the Perfect Tools to
            Empower Your Workforce</h1>
        <p class="max-w-xl text-2xl text-gray-600 mb-12">Managing people isn’t just about processes—it’s about people.
            Our Top HRMS takes the stress out of HR, so you can focus on what really matters: building a happy,
            productive team.</p>
        <div class="inline-flex shadow rounded overflow-hidden">
            <button class="px-10 text-2xl py-3 text-left bg-white hover:bg-gray-100 text-black-600 font-semibold">Get
                Started with a Demo </button>
            <button class="px-4 bg-white text-gray-400">⟶</button>
        </div>
        <div class="flex justify-left text-xl font-bold space-x-8 mt-4 text-sm">
            <div class="flex  items-center space-x-1"><span class="text-green-500">✔</span><span class="text-black">Free
                    Trial</span></div>
            <div class="flex items-center space-x-1"><span class="text-green-500">✔</span><span class="text-black">2
                    minutes to get started</span></div>
        </div>

        <!-- Pricing Plans Section -->
        <section class="py-28 text-center">
            <h2 class="py-3 text-5xl font-bold mb-10 text-gray-1000" style="text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);">
                HRIS Pricing Plans
            </h2>

            <p class="text-gray-800 mb-10">
                <span class="block">Choose the plan that best suits your business!</span>
                <span class="block">This HRIS offers both subscription and pay-as-you-go payment options,</span>
                <span class="block">available in the following packages:</span>
            </p>

            <!-- Toggle Buttons (Design/Animation per provided snippet) -->
            <div class="flex justify-center mt-6 mb-10">
                <div class="relative flex bg-white shadow-md rounded-full overflow-hidden w-80">
                    <!-- Hidden Radio Inputs to Control Active State -->
                    <input type="radio" name="tab" id="package" class="hidden" checked>
                    <input type="radio" name="tab" id="seat" class="hidden">

                    <!-- Sliding Background (Dark Blue #1D395E) with transform support -->
                    <div id="slidingBg"
                        class="absolute top-0 left-0 h-full w-1/2 bg-[#1D395E] rounded-full transform transition-all duration-300">
                    </div>

                    <!-- Package Button -->
                    <label for="package" id="packageLabel"
                        class="relative z-10 w-1/2 py-3 text-sm font-semibold text-center cursor-pointer transition-all text-white">
                        Package
                    </label>

                    <!-- Seat Button -->
                    <label for="seat" id="seatLabel"
                        class="relative z-10 w-1/2 py-3 text-sm font-semibold text-center cursor-pointer transition-all text-gray-700">
                        Seat
                    </label>
                </div>
            </div>

            <!-- Pricing Cards Container (with a static min height) -->
            <div id="pricingCardsContainer" class="min-h-[600px]">
                <!-- Package Cards Group (shown by default) -->
                <div id="packageCards" class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto px-6">
                    <!-- Starter Plan with Linear Gradient -->
                    <div class="bg-gradient-to-l from-[#1D395E] to-[#3C77C4] text-white rounded-xl shadow-lg p-8">
                        <h3 class="text-2xl font-semibold text-left">Starter</h3>
                        <p class="text-4xl font-bold text-left">Free</p>
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
                            class="mt-6 w-full bg-[#2D8DFE] text-white font-bold py-3 rounded-lg hover:bg-[#2278D2] transition">
                            Current Plan
                        </button>
                    </div>

                    <!-- Lite Plan (Recommended) -->
                    <div class="bg-[#2E2E3A] text-white rounded-xl shadow-lg p-8">
                        <h3 class="text-2xl font-semibold text-left">Lite <span class="text-sm">(Recommended)</span>
                        </h3>
                        <p class="text-4xl font-bold text-left">$15 <span class="text-lg">/year</span></p>
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
                        <p class="text-4xl font-bold text-left">$35 <span class="text-lg">/year</span></p>
                        <hr class="border-t-2 border-white my-4">
                        <ul class="mt-6 text-sm text-left list-disc list-inside space-y-2">
                            <li>2 Projects</li>
                            <li>Client billing</li>
                            <li>Free staging</li>
                            <li>Code export</li>
                            <li>White labeling</li>
                            <li>Site password protection</li>
                        </ul>
                        <a href="{{ route('choose.pro') }}"
                            class="mt-6 w-full bg-white text-blue-500 font-bold py-3 rounded-lg hover:bg-gray-200 transition block text-center">
                            Upgrade Plan
                        </a>
                    </div>
                </div>

                <!-- Seat Cards Group (initially hidden) -->
                <div id="seatCards" class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto px-6 hidden">
                    <!-- Standard Seat Plan -->
                    <div class="bg-gradient-to-l from-[#1D395E] to-[#3C77C4] text-white rounded-xl shadow-lg p-8">
                        <h3 class="text-2xl font-semibold text-left">Standard Seat</h3>
                        <p class="text-4xl font-bold text-left">$5 <span class="text-lg">/seat</span></p>
                        <hr class="border-t-2 border-white my-4">
                        <ul class="mt-6 text-sm text-left list-disc list-inside space-y-2">
                            <li>Basic access</li>
                            <li>Time tracking</li>
                            <li>Email support</li>
                        </ul>
                        <button
                            class="mt-6 w-full bg-[#2D8DFE] text-white font-bold py-3 rounded-lg hover:bg-[#2278D2] transition">
                            Select Seat
                        </button>
                    </div>

                    <!-- Premium Seat Plan -->
                    <div class="bg-gradient-to-l from-[#7CA5BF] to-[#3A4D59] text-white rounded-xl shadow-lg p-8">
                        <h3 class="text-2xl font-semibold text-left">Premium Seat</h3>
                        <p class="text-4xl font-bold text-left">$10 <span class="text-lg">/seat</span></p>
                        <hr class="border-t-2 border-white my-4">
                        <ul class="mt-6 text-sm text-left list-disc list-inside space-y-2">
                            <li>Advanced access</li>
                            <li>Priority support</li>
                            <li>Detailed reports</li>
                        </ul>
                        <button
                            class="mt-6 w-full bg-[#2D8DFE] text-white font-bold py-3 rounded-lg hover:bg-[#2278D2] transition">
                            Select Seat
                        </button>
                    </div>

                    <!-- Enterprise Seat Plan -->
                    <div class="bg-[#2E2E3A] text-white rounded-xl shadow-lg p-8">
                        <h3 class="text-2xl font-semibold text-left">Enterprise Seat</h3>
                        <p class="text-4xl font-bold text-left">$15 <span class="text-lg">/seat</span></p>
                        <hr class="border-t-2 border-white my-4">
                        <ul class="mt-6 text-sm text-left list-disc list-inside space-y-2">
                            <li>Full feature access</li>
                            <li>Dedicated support</li>
                            <li>Custom integrations</li>
                        </ul>
                        <button
                            class="mt-6 w-full bg-[#2D8DFE] text-white font-bold py-3 rounded-lg hover:bg-[#2278D2] transition">
                            Select Seat
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const packageRadio = document.getElementById('package');
                const seatRadio = document.getElementById('seat');
                const packageLabel = document.getElementById('packageLabel');
                const seatLabel = document.getElementById('seatLabel');
                const slidingBg = document.getElementById('slidingBg');
                const packageCards = document.getElementById('packageCards');
                const seatCards = document.getElementById('seatCards');

                function updateToggle() {
                    if (seatRadio.checked) {
                        slidingBg.style.transform = 'translateX(100%)';
                        packageLabel.classList.remove('text-white');
                        packageLabel.classList.add('text-gray-700');
                        seatLabel.classList.remove('text-gray-700');
                        seatLabel.classList.add('text-white');

                        packageCards.classList.add('hidden');
                        seatCards.classList.remove('hidden');
                    } else {
                        slidingBg.style.transform = 'translateX(0)';
                        packageLabel.classList.remove('text-gray-700');
                        packageLabel.classList.add('text-white');
                        seatLabel.classList.remove('text-white');
                        seatLabel.classList.add('text-gray-700');

                        packageCards.classList.remove('hidden');
                        seatCards.classList.add('hidden');
                    }
                }

                packageRadio.addEventListener('change', updateToggle);
                seatRadio.addEventListener('change', updateToggle);

                // Set the initial state on page load.
                updateToggle();
            });
        </script>
        <!-- END: SEO Agency Section -->

        <!-- Bottom -->
        <!-- Section: Clients -->
        <h2 class="text-4xl text-center font-semibold">CMLABS Clients</h2>
        <p class="text-base text-center text-gray-700 mt-2">We have been working with some Fortune 40+ clients</p>
        <div class="flex flex-wrap justify-center gap-6 mt-8">
            <img src="{{ asset('Img/siloam.png') }}" alt="Siloam" class="h-12">
            <img src="{{ asset('Img/aqua.png') }}" alt="Aqua" class="h-12">
            <img src="{{ asset('Img/shopee.png') }}" alt="Shopee" class="h-12">
            <img src="{{ asset('Img/enesis.png') }}" alt="Enesis" class="h-12">
            <img src="{{ asset('Img/ocbc.png') }}" alt="OCBC" class="h-12">
            <img src="{{ asset('Img/pegadaian.png') }}" alt="Pegadaian" class="h-12">
            <img src="{{ asset('Img/sribu.png') }}" alt="Sribu" class="h-12">
        </div>
    </section>

    <!-- Section: Don't Miss A Thing -->
    <section class="bg-[#7CA5BF] text-center py-45 text-black">
        <h2 class="text-7xl font-bold">Don't miss a thing!</h2>
        <p class="mt-4 text-3xl">Stay in the loop for smarter HR solutions, feature updates, and special offers.</p>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Logo dan Sosial Media -->
            <div class="space-y-4">
                <img src="{{ asset('img/logo/Logo HRIS-1.png') }}" alt="Logo HRIS" class="h-8">
                <p class="text-sm">Copyright © 2025 Nexcent ltd.<br>All rights reserved</p>
                <div class="flex space-x-3">
                    <a href="#"><i class="fa-brands fa-instagram text-xl"></i></a>
                    <a href="#"><i class="fa-brands fa-dribbble text-xl"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter text-xl"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube text-xl"></i></a>
                </div>
            </div>

            <!-- Company -->
            <div>
                <h4 class="font-bold mb-4">Company</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="#">Testimonials</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div>
                <h4 class="font-bold mb-4">Support</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#">Help center</a></li>
                    <li><a href="#">Terms of service</a></li>
                    <li><a href="#">Legal</a></li>
                    <li><a href="#">Privacy policy</a></li>
                    <li><a href="#">Status</a></li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div>
                <h4 class="font-bold mb-4">Stay up to date</h4>
                <div class="relative">
                    <input type="email" placeholder="Your email address"
                        class="w-full py-2 px-4 rounded-md bg-gray-800 text-white placeholder-gray-400 focus:outline-none">
                    <button class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-400">
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="text-center text-sm border-t border-gray-800 py-4">
            © Copyright 911. All right reserved
        </div>
    </footer>
</body>

</html>
