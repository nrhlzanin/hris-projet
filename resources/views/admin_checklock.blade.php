<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checklock Overview</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
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
        <div class="flex items-center space-x-6">
          <h1 class="text-xl font-bold">Checklock</h1>
          <div class="relative">
            <input type="text" placeholder="Search" class="border px-3 py-1 pl-10 rounded w-64" />
            <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1116.65 16.65z" />
            </svg>
          </div>
        </div>
        <div class="flex items-center space-x-4">
          <button>
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
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

      <!-- Main Table Content -->
      <div class="p-6 overflow-auto">
        <div class="bg-white p-6 rounded shadow-lg">
          <div class="flex justify-between mb-4">
            <h2 class="text-2xl font-semibold">Checklock Overview</h2>
            <div class="flex gap-2">
              <button class="border px-4 py-2 rounded">Filter</button>
              <button class="bg-blue-500 text-white px-4 py-2 rounded">+ Add Data</button>
            </div>
          </div>
          <input type="text" placeholder="Search Employee" class="w-full border rounded px-3 py-2 mb-4">
          <table class="min-w-full text-sm text-left">
            <thead>
              <tr class="bg-gray-100">
                <th class="px-4 py-2">Employee Name</th>
                <th class="px-4 py-2">Jabatan</th>
                <th class="px-4 py-2">Clock In</th>
                <th class="px-4 py-2">Clock Out</th>
                <th class="px-4 py-2">Work Hours</th>
                <th class="px-4 py-2">Approve</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Action</th>
              </tr>
            </thead>
            <tbody class="divide-y">
              <!-- Sample Data Row -->
              <tr>
                <td class="px-4 py-2">Juanita</td>
                <td class="px-4 py-2">CEO</td>
                <td class="px-4 py-2">08.00</td>
                <td class="px-4 py-2">18.30</td>
                <td class="px-4 py-2">10h 30m</td>
                <td class="px-4 py-2 flex items-center gap-2">
                  <img src="/icons/check.svg" alt="yes" class="w-5 h-5" />
                  <img src="/icons/cross.svg" alt="no" class="w-5 h-5" />
                </td>
                <td class="px-4 py-2">
                  <div class="flex flex-col gap-1">
                    <span class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded text-xs">Waiting Approval</span>
                  </div>
                </td>
                <td class="px-4 py-2">
                  <a href="/admin_detailabsen" class="bg-blue-500 text-white px-3 py-1 rounded text-xs inline-block text-center">View</a>
                </td>
              </tr>
            </tbody>
          </table>
          <!-- Pagination -->
          <div class="flex items-center justify-between mt-4 text-sm text-gray-600">
            <div class="flex items-center space-x-2">
              <label>Showing</label>
              <select class="border rounded px-2 py-1">
                <option>10</option>
              </select>
            </div>
            <div>Showing 1 to 10 out of 60 records</div>
          </div>
        </div>
      </div>
     </div>
  </div>
</body>
</html>
