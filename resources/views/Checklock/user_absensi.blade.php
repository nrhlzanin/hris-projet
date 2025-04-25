<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Form Absensi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <div class="flex items-center space-x-4">
          <h1 class="text-xl font-bold">Checklock</h1>
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

      <!-- Main Form Content -->
      <div class="p-6 overflow-auto">
        <div class="bg-white p-6 rounded shadow-lg">
          <h2 class="text-2xl font-semibold mb-4">Add Checkbox</h2>
          <div class="grid grid-cols-2 gap-6">
            <!-- Kolom Kiri -->
            <div class="space-y-4">
              <div>
                <label class="block text-sm font-medium">Select Employees</label>
                <select class="mt-1 w-full border rounded px-3 py-2">
                  <option>Choose Employee</option>
                  <option>John Doe</option>
                  <option>Jane Smith</option>
                </select>
              </div>

              <div>
                <label class="block text-sm font-medium">Absent Type</label>
                <select class="mt-1 w-full border rounded px-3 py-2">
                  <option>Choose Absent Type</option>
                  <option>Clock In</option>
                  <option>Clock Out</option>
                  <option>Absent</option>
                  <option>Annual Leave</option>
                  <option>Sick Leave</option>
                </select>
              </div>

              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label class="block text-sm font-medium">Start Date</label>
                  <input type="date" class="w-full border rounded px-3 py-2 mt-1" />
                </div>
                <div>
                  <label class="block text-sm font-medium">End Date</label>
                  <input type="date" class="w-full border rounded px-3 py-2 mt-1" />
                </div>
              </div>

              <div>
                <label class="block text-sm font-medium mb-1">Upload Supporting Evidence</label>
                <div class="border-2 border-dashed border-gray-300 p-4 rounded text-center text-gray-500">
                  <p>Drag and Drop Here</p>
                  <p class="my-2">Or</p>
                  <button class="text-blue-600 underline">Browse</button>
                </div>
                <button class="mt-3 w-full bg-gray-200 py-2 rounded text-gray-600" disabled>Upload Now</button>
              </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="space-y-4">
              <div>
                <label class="block text-sm font-medium">Location</label>
                <select class="mt-1 w-full border rounded px-3 py-2">
                  <option>Choose Location</option>
                </select>
              </div>

              <div class="rounded overflow-hidden shadow">
                <img src="https://upload.wikimedia.org/wikipedia/commons/e/e0/Malang_Satellite_Image.png" alt="Map"
                     class="w-full h-52 object-cover">
              </div>

              <div class="space-y-4">
                <div>
                  <label class="block text-sm font-medium">Detail Address</label>
                  <input type="text" class="w-full border rounded px-3 py-2 mt-1" value="Malang City, East Java" />
                </div>
                <div class="grid grid-cols-2 gap-4">
                  <div>
                    <label class="block text-sm font-medium">Lat</label>
                    <input type="text" placeholder="Lat lokasi" class="w-full border rounded px-3 py-2 mt-1" />
                  </div>
                  <div>
                 <label class="block text-sm font-medium">Long</label>
                    <input type="text" placeholder="Long lokasi" class="w-full border rounded px-3 py-2 mt-1" />
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Footer buttons -->
          <div class="flex justify-end space-x-4 mt-6">
            <button type="button" onclick="window.location.href='/user-checklock';" class="px-4 py-2 bg-gray-300 text-gray-700 rounded">Cancel</button>
            <button class="px-4 py-2 bg-black text-white rounded">Save</button>
          </div>
        </div>
      </div>
    </div>
    </div>
</body>
</html>
