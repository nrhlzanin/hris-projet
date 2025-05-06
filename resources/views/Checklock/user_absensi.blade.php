<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Form Absensi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
  <div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-20 bg-blue-200 flex flex-col items-center py-6 shadow-md mt-16">
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
    </aside>

    <!-- Main content -->
    <div class="px-4 lg:px-20 shadow-md w-full">

      <!-- Navbar -->
      <nav class="bg-white px-6 py-4 flex items-center justify-between shadow fixed top-0 left-0 w-full z-10">
        <div class="flex items-center space-x-4">
          <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-10">
          <h1 class="text-xl font-bold pl-6">Employee Database</h1>
        </div>
        <div class="absolute left-1/2 transform -translate-x-1/2 flex items-center">
          <input type="text" placeholder="Search"
                 class="w-[400px] px-6 py-3 border rounded-l-lg focus:outline-none focus:ring focus:border-blue-300">
          <button class="bg-blue-500 text-white px-4 py-3 rounded-r-lg hover:bg-blue-600">
            <i class="ri-search-line"></i>
          </button>
        </div>
        <div class="flex items-center space-x-4">
          <button>
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
          </button>
          <div class="relative">
            <button class="flex items-center space-x-2 focus:outline-none">
              <div class="w-8 h-8 rounded-full bg-blue-800"></div>
              <div class="text-sm text-gray-700">username</div>
              <i class="ri-arrow-down-s-line"></i> 
            </button>
          </div>
        </div>
      </nav>

    <!-- Add Checkbox Form Card -->
    <div class="bg-white p-6 rounded-lg shadow-md w-full mt-24">
      <h2 class="text-xl font-semibold mb-4">Add Checkbox</h2>
      
      <form>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
          <!-- Left Section -->

          <div>
            <label class="block text-sm font-medium">Absent Type</label>
            <select class="w-full border rounded px-3 py-2 mt-1">
              <option>Clock In</option>
              <option>Clock Out</option>
              <option selected>Absent</option>
              <option>Annual Leave</option>
              <option>Sick Leave</option>
            </select>
          </div>

            <div class="flex gap-4">
              <div class="flex-1">
                <label class="block text-sm font-medium">Start Date</label>
                <input type="date" class="w-full border rounded px-3 py-2">
              </div>
              <div class="flex-1">
                <label class="block text-sm font-medium">End Date</label>
                <input type="date" class="w-full border rounded px-3 py-2">
              </div>
            </div>
            
            <div>
              <label class="block text-sm font-medium">Upload Supporting Evidence</label>
              <div class="border-dashed border-2 rounded-lg p-6 text-center">
                Drag and Drop Here<br>Or<br>
                <a href="#" id="browseButton" class="text-blue-500 underline">Browse</a>
                <input type="file" id="fileInput" class="hidden">
                <div id="fileName" class="mt-2 text-sm text-gray-600"></div>
              </div>
              <button id="uploadBtn" class="mt-2 bg-gray-200 text-sm px-4 py-2 rounded cursor-not-allowed" disabled>Upload Now</button>
            </div>

          <!-- Right Section -->
          <div class="space-y-4">
            <div>
              <label class="block text-sm font-medium">Location</label>
              <select class="w-full border rounded px-3 py-2">
                <option>Choose Location</option>
              </select>
            </div>

            <div>
              <img src="https://via.placeholder.com/400x200?text=Map" alt="Map" class="w-full h-48 object-cover rounded border">
            </div>

            <div>
              <label class="block text-sm font-medium">Detail Address</label>
              <input type="text" value="Malang City, East Java" class="w-full border rounded px-3 py-2">
            </div>

            <div class="flex gap-4">
              <div class="flex-1">
                <label class="block text-sm font-medium">Lat</label>
                <input type="text" class="w-full border rounded px-3 py-2" placeholder="Lat lokasi">
              </div>
              <div class="flex-1">
                <label class="block text-sm font-medium">Long</label>
                <input type="text" class="w-full border rounded px-3 py-2" placeholder="Long lokasi">
              </div>
            </div>
          <!-- Footer buttons -->
          <div class="flex justify-end space-x-4 mt-6">
            <button type="button" onclick="window.location.href='/user-checklock';" class="px-4 py-2 bg-gray-300 text-gray-700 rounded">Cancel</button>
            <button class="px-4 py-2 bg-black text-white rounded">Save</button>
          </div>
        </div>
        
        <div class="flex justify-end space-x-4 mt-6">
          <a href="/admin-checklock">
            <button class="bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded">
              Cancel
            </button>
          </a>
          
          <button class="px-4 py-2 bg-black text-white rounded">Save</button>
        </div>
        
        <script>
          document.addEventListener("DOMContentLoaded", function () {
            const fileInput = document.getElementById("fileInput");
            const browseButton = document.getElementById("browseButton");
            const fileName = document.getElementById("fileName");
            const uploadBtn = document.getElementById("uploadBtn");
        
            browseButton.addEventListener("click", function (e) {
              e.preventDefault();
              fileInput.click();
            });
        
            fileInput.addEventListener("change", function () {
              if (fileInput.files.length > 0) {
                fileName.textContent = fileInput.files[0].name;
                uploadBtn.disabled = false;
                uploadBtn.classList.remove("cursor-not-allowed", "bg-gray-200", "text-gray-600");
                uploadBtn.classList.add("cursor-pointer", "bg-blue-500", "text-white", "hover:bg-blue-600");
              }
            });
          });
        </script>
        