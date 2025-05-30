<nav class="bg-white px-4 md:px-6 py-4 flex items-center justify-between shadow w-full fixed top-0 left-0 z-50">
    <!-- Logo dan Judul -->
    <div class="flex items-center space-x-4">
        <!-- Toggle Button (mobile only) -->
        <button class="md:hidden text-gray-600" onclick="toggleSidebar()">
            <i class="ri-menu-line text-2xl"></i>
        </button>

        <img id="logo-img" src="{{ asset('img/logo/Logo HRIS-1.png') }}" alt="Logo" class="h-10">

        @php
            $segment = request()->segment(1);  
            $title = ucwords(str_replace('-', ' ', $segment ?? 'Dashboard'));
        @endphp
        <h1 class="text-lg md:text-xl font-bold pl-2 md:pl-6">{{ $title }}</h1>
    </div>

    <!-- Search Bar (Hidden on small screens) -->
    <div class="hidden md:flex absolute left-1/2 transform -translate-x-1/2 items-center">
        <input type="text" placeholder="Search"
               class="w-[300px] lg:w-[400px] px-4 py-2 border rounded-l-lg focus:outline-none focus:ring focus:border-blue-300 text-sm">
        <button class="bg-blue-500 text-white px-4 py-2 rounded-r-lg hover:bg-blue-600">
            <i class="ri-search-line"></i>
        </button>
    </div>

    <!-- Right Icons -->
    <div class="flex items-center space-x-4">
        <!-- Notification Icon -->
        <button class="text-gray-600 hover:text-blue-500">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
        </button>

        <!-- User Dropdown -->
        <div class="relative">
            <button class="flex items-center space-x-2 focus:outline-none" id="userMenuButton">
                <div class="w-8 h-8 rounded-full bg-blue-800"></div>
                <div class="text-sm text-gray-700 hidden md:block">
                    <div>username</div>
                </div>
                <i class="ri-arrow-down-s-line text-gray-700"></i>
            </button>
            <!-- Optional: dropdown menu -->
        </div>
    </div>
</nav>

<!-- Content Wrapper -->
<div class="pt-24 px-4 md:px-6 w-full">
    <!-- Your main content goes here -->
</div>

<!-- Sidebar toggle handler -->
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    }
</script>
