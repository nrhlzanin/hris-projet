<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Employee</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="flex h-screen">

    <!-- Sidebar -->
    <aside class="w-20 bg-blue-200 fl   ex flex-col items-center py-6 shadow-md" style="margin-top: 64px;">
        <div class="h-screen w-16 bg-blue-200 flex flex-col items-center py-4">
            <nav class="flex flex-col space-y-6">
                <a href="#" class="hover:text-blue-500"><i class="ri-dashboard-line text-2xl"></i></a>
                <a href="#" class="hover:text-blue-500"><i class="ri-user-3-line text-2xl"></i></a>
                <a href="#" class="hover:text-blue-500"><i class="ri-time-line text-2xl"></i></a>
                <a href="#" class="hover:text-blue-500"><i class="ri-calendar-line text-2xl"></i></a>
                <a href="#" class="hover:text-blue-500"><i class="ri-bar-chart-box-line text-2xl"></i></a>
            </nav>
            <div class="flex-1"></div>
            <nav class="flex flex-col space-y-6">
                <a href="#" class="hover:text-blue-500"><i class="ri-customer-service-2-line text-2xl"></i></a>
                <a href="#" class="hover:text-blue-500"><i class="ri-settings-3-line text-2xl"></i></a>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">

        <!-- Top Navbar -->
        <nav class="bg-white px-6 py-4 flex items-center justify-between shadow w-full fixed top-0 left-0 z-10">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-10">
                <h1 class="text-xl font-bold pl-6">Employee Database</h1>
            </div>
            <div class="absolute left-1/2 transform -translate-x-1/2 flex items-center">
                <input type="text" placeholder="Search" class="w-[400px] px-6 py-3 border rounded-l-lg focus:outline-none focus:ring focus:border-blue-300">
                <button class="bg-blue-500 text-white px-4 py-3 rounded-r-lg hover:bg-blue-600"><i class="ri-search-line"></i></button>
            </div>
            <div class="flex items-center space-x-4">
                <button>
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                </button>
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

        <!-- Form Section -->
        <div class="flex items-center justify-center flex-grow mt-24 px-6">
            <div class="max-w-2xl w-full p-6 bg-white shadow-md rounded-2xl">
                <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">New Employee</h2>
                <form action="{{ route('employees.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="full_name" class="block text-sm font-medium text-gray-600">Full Name</label>
                        <input type="text" id="full_name" name="full_name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
                    </div>
                    <div>
                        <label for="employee_id" class="block text-sm font-medium text-gray-600">Employee ID</label>
                        <input type="text" id="employee_id" name="employee_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm" required>
                    </div>
                    <div>
                        <label for="department" class="block text-sm font-medium text-gray-600">Department</label>
                        <input type="text" id="department" name="department" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm" required>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                        <input type="email" id="email" name="email" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm" required>
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-600">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                    </div>
                    <div class="pt-4">
                        <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                            Save Employee
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

</body>
</html>
