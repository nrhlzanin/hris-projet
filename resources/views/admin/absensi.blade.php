<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Absensi - HRIS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>

<body class="bg-gray-100 min-h-screen">
    <div class="flex h-screen">
        <!-- Sidebar -->
            @include('components.sidebar')
        <!-- Main content -->
    <div class="flex-1 flex flex-col ml-20">

            <!-- Navbar -->
            @include('components.navbar')

      <!-- Form -->
      <div class="p-6 mt-20">
        <div class="bg-white rounded shadow p-6">
          <h2 class="text-2xl font-semibold mb-4">Add Absensi for Employee</h2>
          <form>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Left Column -->
              <div class="space-y-4">
                <div>
                  <label class="block text-sm font-medium mb-1">Search Employee</label>
                  <input type="text" id="employeeSearch" placeholder="Type employee name..." class="w-full border rounded px-3 py-2" autocomplete="off">
                  <ul id="employeeResults" class="border rounded mt-1 bg-white shadow text-sm hidden"></ul>
                </div>
                <div>
                  <label class="block text-sm font-medium mb-1">Absent Type</label>
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
                    <button type="button" class="text-blue-600 underline" onclick="document.getElementById('fileInput').click()">Browse</button>
                    <input type="file" id="fileInput" class="hidden">
                    <div id="fileName" class="mt-2 text-xs text-gray-600"></div>
                  </div>
                </div>
                <button type="button" id="uploadBtn" class="mt-2 w-full bg-gray-200 py-2 rounded text-gray-600 cursor-not-allowed" disabled>Upload Now</button>
              </div>

              <!-- Right Column -->
              <div class="space-y-4">
                <div>
                  <label class="block text-sm font-medium mb-1">Location</label>
                  <div id="map" class="w-full h-52 rounded border"></div>
                </div>
                <div>
                  <label class="block text-sm font-medium mb-1">Detail Address</label>
                  <input type="text" value="Malang City, East Java" class="w-full border rounded px-3 py-2 mt-1">
                </div>
                <div class="grid grid-cols-2 gap-4">
                  <div>
                    <label class="block text-sm font-medium mb-1">Lat</label>
                    <input type="text" id="latInput" placeholder="Lat lokasi" class="w-full border rounded px-3 py-2 mt-1">
                  </div>
                  <div>
                    <label class="block text-sm font-medium mb-1">Long</label>
                    <input type="text" id="lngInput" placeholder="Long lokasi" class="w-full border rounded px-3 py-2 mt-1">
                  </div>
                </div>
              </div>
            </div>
            <div class="flex justify-end space-x-4 mt-6">
              <a href="/admin-checklock">
                <button type="button" class="bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded">
                  Cancel
                </button>
              </a>
              <button type="submit" class="px-4 py-2 bg-black text-white rounded">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Map & Marker Draggable
        document.addEventListener("DOMContentLoaded", function () {
            var defaultLat = -7.983908;
            var defaultLng = 112.621391;
            var map = L.map('map').setView([defaultLat, defaultLng], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            var marker = L.marker([defaultLat, defaultLng], { draggable: true }).addTo(map);

            // Set initial input values
            document.getElementById('latInput').value = defaultLat;
            document.getElementById('lngInput').value = defaultLng;

            // Update input when marker moved
            marker.on('dragend', function (e) {
                var latlng = marker.getLatLng();
                document.getElementById('latInput').value = latlng.lat;
                document.getElementById('lngInput').value = latlng.lng;
            });

            // Update marker when map clicked
            map.on('click', function (e) {
                marker.setLatLng(e.latlng);
                document.getElementById('latInput').value = e.latlng.lat;
                document.getElementById('lngInput').value = e.latlng.lng;
            });
        });

        // File Upload
        document.addEventListener("DOMContentLoaded", function () {
            const fileInput = document.getElementById("fileInput");
            const uploadBtn = document.getElementById("uploadBtn");
            const fileName = document.getElementById("fileName");

            fileInput.addEventListener("change", function () {
                if (fileInput.files.length > 0) {
                    fileName.textContent = fileInput.files[0].name;
                    uploadBtn.disabled = false;
                    uploadBtn.classList.remove("cursor-not-allowed", "bg-gray-200", "text-gray-600");
                    uploadBtn.classList.add("cursor-pointer", "bg-blue-500", "text-white", "hover:bg-blue-600");
                }
            });
        });

        // Simple Employee Search (dummy data, replace with AJAX in production)
        document.addEventListener("DOMContentLoaded", function () {
            const employees = [
                "Andi Wijaya",
                "Budi Santoso",
                "Citra Dewi",
                "Dewi Lestari",
                "Eko Prasetyo"
            ];
            const searchInput = document.getElementById("employeeSearch");
            const resultsList = document.getElementById("employeeResults");

            searchInput.addEventListener("input", function () {
                const query = searchInput.value.toLowerCase();
                resultsList.innerHTML = "";
                if (query.length === 0) {
                    resultsList.classList.add("hidden");
                    return;
                }
                const filtered = employees.filter(name => name.toLowerCase().includes(query));
                if (filtered.length === 0) {
                    resultsList.classList.add("hidden");
                    return;
                }
                filtered.forEach(name => {
                    const li = document.createElement("li");
                    li.textContent = name;
                    li.className = "px-3 py-1 hover:bg-blue-100 cursor-pointer";
                    li.onclick = function () {
                        searchInput.value = name;
                        resultsList.classList.add("hidden");
                    };
                    resultsList.appendChild(li);
                });
                resultsList.classList.remove("hidden");
            });

            // Hide results when clicking outside
            document.addEventListener("click", function (e) {
                if (!searchInput.contains(e.target) && !resultsList.contains(e.target)) {
                    resultsList.classList.add("hidden");
                }
            });
        });
    </script>


</html></body></html>
