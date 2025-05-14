<nav class="bg-white px-6 py-4 flex items-center justify-between shadow w-full fixed top-0 left-0 z-10">
    <!-- Logo dan Judul -->
    <div class="flex items-center space-x-4">
        <img id="logo-img" src="{{ asset('img/logo/Logo HRIS-1.png') }}" alt="Logo" class="h-10">
        
        <!-- Judul Dinamis berdasarkan Route -->
        @php
            // Mengambil segmen pertama URL, yang biasanya menunjukkan nama folder atau route utama
            $segment = request()->segment(1);  
            
            // Jika tidak ada segmen, set default ke 'Dashboard'
            $title = ucwords(str_replace('-', ' ', $segment ?? 'Dashboard'));
        @endphp
        <h1 class="text-xl font-bold pl-6">{{ $title }}</h1>
    </div>
  
    <!-- Search Bar -->
    <div class="absolute left-1/2 transform -translate-x-1/2 flex items-center">
        <input type="text" placeholder="Search"
               class="w-[400px] px-6 py-3 border rounded-l-lg focus:outline-none focus:ring focus:border-blue-300">
        <button class="bg-blue-500 text-white px-4 py-3 rounded-r-lg hover:bg-blue-600">
            <i class="ri-search-line"></i>
        </button>
    </div>
  
    <!-- Icon & User Menu -->
    <div class="flex items-center space-x-4">
        <!-- Notification Icon -->
        <button>
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
        </button>
  
        <!-- User Dropdown -->
        <div class="relative">
            <button class="flex items-center space-x-2 focus:outline-none" id="userMenuButton">
                <div class="w-8 h-8 rounded-full bg-blue-800"></div>
                <div class="text-sm text-gray-700">
                    <div>username</div>
                </div>
                <i class="ri-arrow-down-s-line"></i>
            </button>
        </div>
    </div>
</nav>

<!-- Content Wrapper -->
<div class="ml-20 pt-24 px-6 w-full">
    <!-- Your main content goes here -->
</div>

<!-- JavaScript: Auto-set title from route (if needed) -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Mengambil elemen logo dan judul
        const img = document.getElementById('logo-img');
        const title = document.getElementById('logo-title');
        
        // Mengecek jika elemen ada dan menetapkan title berdasarkan file logo
        if (img && title) {
            const src = img.getAttribute('src');
            const fileName = src.split('/').pop().split('.')[0];  // Mendapatkan nama file tanpa ekstensi

            // Format nama file dan tetapkan sebagai judul
            const formatted = fileName
                .replace(/[-_]/g, ' ')  // Mengubah tanda hubung atau underscore menjadi spasi
                .replace(/\b\w+/g, function (word) {  // Mengkapitalisasi setiap kata
                    return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
                });

            title.textContent = formatted;  // Menetapkan judul pada elemen
        }
    });
</script>
