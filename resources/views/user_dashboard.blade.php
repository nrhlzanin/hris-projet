<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - HRIS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-sm text-gray-800">
  <div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-20 bg-white border-r flex flex-col items-center py-6 space-y-6 shadow">
        <a href="#"><img src="/icons/dashboard.svg" class="w-6 h-6" /></a>
        <a href="#"><img src="/icons/employees.svg" class="w-6 h-6" /></a>
        <a href="#"><img src="/icons/clock.svg" class="w-6 h-6" /></a>
        <a href="#"><img src="/icons/calendar.svg" class="w-6 h-6" /></a>
        <a href="#"><img src="/icons/report.svg" class="w-6 h-6" /></a>
        <a href="#"><img src="/icons/support.svg" class="w-6 h-6" /></a>
        <a href="#" class="mt-auto"><img src="/icons/setting.svg" class="w-6 h-6" /></a>
      </aside>

      <!-- Main Content -->
      <div class="flex-1 flex flex-col">
        <!-- Navbar -->
        <nav class="bg-white px-6 py-4 flex justify-between items-center border-b">
          <div class="flex items-center space-x-4">
            <h1 class="text-xl font-bold">Dashboard</h1>
            <div class="relative">
              <input type="text" placeholder="Search" class="pl-10 pr-4 py-1 border rounded-lg text-sm w-64 bg-gray-100 focus:outline-none" />
              <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 18.5a7.5 7.5 0 006.15-3.85z"/>
              </svg>
            </div>
          </div>
          <div class="flex items-center space-x-4">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
            <div class="flex items-center gap-2">
              <div class="w-8 h-8 rounded-full bg-blue-900"></div>
              <div>
                <div class="font-semibold">username</div>
                <div class="text-xs text-gray-500">roles user</div>
              </div>
            </div>
          </div>
        </nav>

      <!-- Status Cards -->
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6 p-6">
        <div class="bg-white p-4 rounded-lg shadow">
          <p class="text-sm text-gray-500">Work Hours</p>
          <h3 class="text-xl font-bold">120h 54m</h3>
        </div>
        <div class="bg-white p-4 rounded-lg shadow">
          <p class="text-sm text-gray-500">On Time</p>
          <h3 class="text-xl font-bold">20</h3>
        </div>
        <div class="bg-white p-4 rounded-lg shadow">
          <p class="text-sm text-gray-500">Late</p>
          <h3 class="text-xl font-bold">5</h3>
        </div>
        <div class="bg-white p-4 rounded-lg shadow">
          <p class="text-sm text-gray-500">Absent</p>
          <h3 class="text-xl font-bold">10</h3>
        </div>
      </div>

      <!-- Summary Section -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 px-6">
        <!-- Attendance Summary -->
        <div class="bg-white p-6 rounded-lg shadow">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Attendance Summary</h2>
            <select class="border text-sm rounded px-2 py-1">
              <option>months</option>
            </select>
          </div>
          <img src="https://via.placeholder.com/300x200?text=Total+Presensi+Donut+Chart" class="w-full rounded" alt="Chart">
          <div class="flex justify-around mt-4 text-sm">
            <span class="text-green-500">● Present</span>
            <span class="text-yellow-500">● Permit</span>
            <span class="text-red-500">● Leave</span>
            <span class="text-orange-400">● Sick</span>
          </div>
        </div>

        <!-- Leave Summary -->
        <div class="bg-white p-6 rounded-lg shadow">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Leave Summary</h2>
            <select class="border text-sm rounded px-2 py-1">
              <option>Time Span</option>
            </select>
          </div>
          <div class="bg-gray-100 p-4 rounded-lg text-center">
            <p class="text-sm text-gray-600">Total Quota Annual Leave</p>
            <h3 class="text-xl font-bold mb-2">12 Days</h3>
            <button class="bg-blue-500 text-white text-sm px-4 py-2 rounded hover:bg-blue-600">Request Leave</button>
          </div>
          <div class="grid grid-cols-2 gap-4 mt-4 text-center">
            <div class="bg-white border rounded-lg p-4">
              <p class="text-sm text-gray-600">Taken</p>
              <h3 class="text-xl font-bold">4 Days</h3>
              <a href="#" class="text-blue-500 text-sm underline">See Details</a>
            </div>
            <div class="bg-white border rounded-lg p-4">
              <p class="text-sm text-gray-600">Remaining</p>
              <h3 class="text-xl font-bold">8 Days</h3>
              <button class="text-blue-500 text-sm underline">Request Leave</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Work Hours Chart -->
      <div class="bg-white p-6 rounded-lg shadow mx-6 mb-6">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-lg font-semibold">Your Work Hours</h2>
          <select class="border text-sm rounded px-2 py-1">
            <option>View By Month</option>
          </select>
        </div>
        <img src="https://via.placeholder.com/600x200?text=Work+Hour+Bar+Chart" alt="Chart" class="w-full rounded">
      </div>

    </div>
  </div>
</body>
</html>
