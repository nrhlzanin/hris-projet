<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checklock Overview</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-20 bg-blue-200 flex flex-col items-center py-6 space-y-6 shadow-md">
        <a href="#"><img src="/icons/dashboard.svg" class="w-6 h-6" /></a>
        <a href="#"><img src="/icons/employees.svg" class="w-6 h-6" /></a>
        <a href="#"><img src="/icons/clock.svg" class="w-6 h-6" /></a>
        <a href="#"><img src="/icons/calendar.svg" class="w-6 h-6" /></a>
        <a href="#"><img src="/icons/report.svg" class="w-6 h-6" /></a>
        <a href="#"><img src="/icons/support.svg" class="w-6 h-6" /></a>
        <a href="#" class="mt-auto"><img src="/icons/setting.svg" class="w-6 h-6" /></a>
    </aside>

    <!-- Main content -->
    <div class="flex-1 flex flex-col">

        <!-- Navbar -->
        <nav class="bg-white px-6 py-4 flex items-center justify-between shadow">
            <div class="flex items-center space-x-4">
                <h1 class="text-xl font-bold">Employee Database</h1>
                <input type="text" placeholder="Search"
                       class="ml-4 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="flex items-center space-x-4">
                <button>
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                </button>
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 rounded-full bg-blue-800"></div>
                    <div class="text-sm text-gray-700">
                        <div>username</div>
                        <div class="text-xs text-gray-500">roles user</div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Checklock Overview -->
        <div class="p-6">
            <div class="bg-white rounded-lg shadow p-4">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold">Checklock Overview</h2>
                    <div class="flex space-x-2">
                        <input type="text" placeholder="Search Employee"
                               class="px-3 py-2 border rounded-md focus:ring focus:border-blue-300">
                        <button class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Filter</button>
                        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">+ Add Data</button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="p-2">Date</th>
                            <th class="p-2">Clock In</th>
                            <th class="p-2">Clock Out</th>
                            <th class="p-2">Work Hours</th>
                            <th class="p-2 text-center">Status</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y">
                        <!-- Example Row -->
                        <tr>
                            <td class="p-2">March 01, 2025</td>
                            <td class="p-2">09:28 AM</td>
                            <td class="p-2">04:00 PM</td>
                            <td class="p-2">10h 5m</td>
                            <td class="p-2 text-center"><span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs">On Time</span></td>
                        </tr>
                        <tr>
                            <td class="p-2">March 02, 2025</td>
                            <td class="p-2">09:30 AM</td>
                            <td class="p-2">04:30 PM</td>
                            <td class="p-2">8h 50m</td>
                            <td class="p-2 text-center"><span class="bg-red-600 text-white px-2 py-1 rounded-full text-xs">Late</span></td>
                        </tr>
                        <!-- Add other rows here -->
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4 flex justify-between items-center text-sm text-gray-500">
                    <div>
                        Showing <select class="border rounded px-1 py-0.5 ml-1"><option>10</option></select> out of 60 records
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="px-2 py-1 border rounded">1</button>
                        <button class="px-2 py-1 border rounded bg-blue-500 text-white">2</button>
                        <button class="px-2 py-1 border rounded">3</button>
                    </div>
                </div>
            </div>
        </div>

     </div>
</div>
</body>
</html>
