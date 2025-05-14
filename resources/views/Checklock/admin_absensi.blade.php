<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Checklock - Add Checkbox</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen">
  <div class="flex h-screen">

    {{-- Sidebar --}}
    @include('components.sidebar')

    <!-- Main content -->
    <div class="flex-1 flex flex-col">

      {{-- Navbar --}}
      @include('components.navbar')

      <!-- Form -->
      <div class="p-6 mt-20">
        <div class="bg-white rounded shadow p-6">
          <h2 class="text-2xl font-semibold mb-4">Add Checkbox</h2>
          <div class="grid grid-cols-2 gap-6">
            <!-- Left Column -->
            <div class="space-y-4">
              <div>
                <label class="block text-sm font-medium">Select Employees</label>
                <!-- You can add the select input for employees here -->
              </div>
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
              <div>
                <label class="block text-sm font-medium mb-1">Upload Supporting Evidence</label>
                <div class="border-2 border-dashed border-gray-300 p-4 rounded text-center text-gray-500">
                  <p>Drag and Drop Here</p>
                  <p class="my-2">Or</p>
                  <button class="text-blue-600 underline">Browse</button>
                </div>
              </div>
              <button class="mt-2 w-full bg-gray-200 py-2 rounded text-gray-600" disabled>Upload Now</button>
            </div>

            <!-- Right Column -->
            <div class="space-y-4">
              <div>
                <label class="block text-sm font-medium">Location</label>
                <select class="w-full border rounded px-3 py-2 mt-1">
                  <option>Choose Location</option>
                </select>
              </div>
              <div class="rounded overflow-hidden shadow">
                <img src="https://upload.wikimedia.org/wikipedia/commons/e/e0/Malang_Satellite_Image.png" alt="Map" class="w-full h-52 object-cover">
              </div>
              <div>
                <label class="block text-sm font-medium">Detail Address</label>
                <input type="text" value="Malang City, East Java" class="w-full border rounded px-3 py-2 mt-1">
              </div>
              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label class="block text-sm font-medium">Lat</label>
                  <input type="text" placeholder="Lat lokasi" class="w-full border rounded px-3 py-2 mt-1">
                </div>
                <div>
                  <label class="block text-sm font-medium">Long</label>
                  <input type="text" placeholder="Long lokasi" class="w-full border rounded px-3 py-2 mt-1">
                </div>
              </div>
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
        </div>
      </div>
    </div>
  </div>
</body>

</html>
