<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel HRIS</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;600;700;900&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-inter bg-gradient-to-b from-white to-blue-400">
    <!-- Navbar -->
    <nav class="flex items-center justify-between px-8 py-4 shadow bg-white">
        <div class="flex items-center space-x-4">
            <img src="https://via.placeholder.com/40x40?text=Logo" alt="Logo" class="h-8 w-8" />
            <ul class="flex space-x-8 text-sm font-medium text-gray-700">
                <li><a href="#" class="hover:text-blue-600">Home</a></li>
                <li><a href="#" class="hover:text-blue-600">Services</a></li>
                <li><a href="#" class="hover:text-blue-600">About</a></li>
                <li><a href="#" class="hover:text-blue-600">Blog</a></li>
            </ul>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('sign.in') }}" class="px-4 py-2 bg-gray-100 text-sm font-medium text-gray-700 rounded hover:bg-gray-200">Sign in →</a>
            <a href="{{ route('get.started') }}" class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded hover:bg-blue-600">Get Started</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="px-8 py-16 text-left">
        <h1 class="max-w-4xl text-8xl font-inter font-black text-gray-900 leading-tight mb-10">Get the Perfect Tools to Empower Your Workforce</h1>
        <p class="max-w-xl text-2xl text-gray-600 mb-12">Managing people isn’t just about processes—it’s about people. Our Top HRMS takes the stress out of HR, so you can focus on what really matters: building a happy, productive team.</p>
        <div class="inline-flex shadow rounded overflow-hidden">
            <button class="px-10 text-2xl py-3 text-left bg-white hover:bg-gray-100 text-black-600 font-semibold">Get Started with a Demo </button>
            <button class="px-4 bg-white text-gray-400">⟶</button>
        </div>
        <div class="flex justify-left text-xl font-bold space-x-8 mt-4 text-sm">
            <div class="flex  items-center space-x-1"><span class="text-green-500">✔</span><span class="text-black">Free Trial</span></div>
            <div class="flex items-center space-x-1"><span class="text-green-500">✔</span><span class="text-black">2 minutes to get started</span></div>
        </div>

    <!-- Pricing Plans Section -->
    <section class="py-20 text-center">
        <h2 class="text-4xl font-bold mb-2">HRIS Pricing Plans</h2>
        <p class="text-gray-700 mb-8">Choose the plan that best suits your business. This HRIS offers both subscription and pay-as-you-go payment options.</p>
  
        <div class="inline-flex mb-10">
          <button class="px-6 py-2 bg-white shadow text-sm font-semibold rounded-l">Package</button>
          <button class="px-6 py-2 bg-blue-500 text-white shadow text-sm font-semibold rounded-r">Seat</button>
        </div>
  
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-h-lg max-w-6xl mx-auto px-6">
          <!-- Starter -->
          <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-xl font-semibold">Starter</h3>
            <p class="text-3xl font-bold">Free</p>
            <ul class="mt-4 text-sm text-left list-disc list-inside space-y-2">
              <li>GPS based attendance</li>
              <li>Overtime management</li>
              <li>Leave and time-off request</li>
              <li>Employee data management</li>
              <li>FIxed work schedule management</li>
              <li>Automatic fixed calculation</li>
            </ul>
            <button class="mt-6 w-full bg-blue-100 py-2 rounded">Current Plan</button>
          </div>
  
          <!-- Lite -->
          <div class="bg-gray-900 text-white rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-semibold">Lite <span class="text-sm">(Recommended)</span></h3>
            <p class="text-3xl font-bold">$15 <span class="text-base">/year</span></p>
            <ul class="mt-4 text-sm text-left list-disc list-inside space-y-2">
              <li>All standard features</li>
              <li>Clock-in clock-out attendance settings</li>
              <li>Employee document management</li>
              <li>Sick leave & time-out settings</li>
              <li>Shift management</li>
              <li>Site password protection</li>
            </ul>
            <button class="mt-6 w-full bg-blue-600 py-2 rounded">Upgrade plan</button>
          </div>
  
          <!-- Pro -->
          <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-xl font-semibold">Pro</h3>
            <p class="text-3xl font-bold">$35 <span class="text-base">/year</span></p>
            <ul class="mt-4 text-sm text-left list-disc list-inside space-y-2">
              <li>2 Project</li>
              <li>Client billing</li>
              <li>Free staging</li>
              <li>Code export</li>
              <li>White labeling</li>
              <li>Site Password protection</li>
            </ul>
            <button class="mt-6 w-full bg-blue-100 py-2 rounded">Upgrade plan</button>
          </div>
        </div>
      </section>
      <!-- END: Pricing Plans Section -->
  
      <!-- START: SEO Agency Section -->
      <section class="bg-blue-200 py-20 px-8">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10 items-center">
          <div class="h-60 bg-gray-300 rounded-md"></div>
          <div>
            <h2 class="text-4xl font-bold mb-4">cmlabs SEO Agency Indonesia</h2>
            <p class="text-gray-800 text-lg leading-relaxed">cmlabs is a global SEO agency that offers its services in Indonesia. We help businesses achieve optimal visibility on search engine results pages (SERPs). With attentive website optimization and impactful digital marketing solutions, we will be your guide to a sustainable and authoritative online presence!</p>
            <h3 class="mt-6 text-xl font-bold">Widely Available in These Countries</h3>
          </div>
        </div>
  
        <!-- Stats Block -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-10 text-center">
          <div class="bg-black text-white py-6 rounded">
            <p class="text-2xl font-bold">314,566,114+</p>
            <p>Total Engagement</p>
          </div>
          <div class="bg-black text-white py-6 rounded">
            <p class="text-2xl font-bold">15.425</p>
            <p>Avg Keyword Rank</p>
          </div>
          <div class="bg-black text-white py-6 rounded">
            <p class="text-2xl font-bold">20,836+</p>
            <p>Content Produced</p>
          </div>
          <div class="bg-black text-white py-6 rounded">
            <p class="text-2xl font-bold">9,185,238,642+</p>
            <p>Total Reach</p>
          </div>
        </div>
      </section>
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
                    <img src="/Img/hris-logo.svg" alt="Logo HRIS" class="h-8">
                    <p class="text-sm">Copyright © 2020 Nexcent ltd.<br>All rights reserved</p>
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
