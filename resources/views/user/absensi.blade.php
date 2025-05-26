<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Absensi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
    <!-- Sidebar -->
    @include('components.sidebar')

    <!-- Main content -->
    <div class="flex-1 flex flex-col ml-20">
        
        <!-- Navbar -->
        @include('components.navbar')

            <!-- Add Checkbox Form Card -->
            <div class="bg-white p-6 rounded-lg shadow-md w-full mt-6">
                <h2 class="text-xl font-semibold mb-4">Add Checkbox</h2>

                <form>
                    <!-- Flexbox Layout: Two Rows -->
                    <div class="flex flex-col lg:flex-row gap-6">

                        <!-- Left Section (Row 1) -->
                        <div class="space-y-4 w-full lg:w-1/2">
                            <div>
                                <label class="block text-sm font-medium">Absent Type</label>
                                <select class="w-full border rounded px-3 py-2">
                                    <option>Choose Absent Type</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Upload Supporting Evidence</label>
                                <div class="border-dashed border-2 rounded-lg p-6 text-center">
                                    Drag and Drop Here<br>Or<br>
                                    <a href="#" id="browseButton" class="text-blue-500 underline">Browse</a>
                                    <input type="file" id="fileInput" class="hidden">
                                    <div id="fileName" class="mt-2 text-sm text-gray-600"></div>
                                </div>
                                <button id="uploadBtn"
                                    class="mt-2 bg-gray-200 text-sm px-4 py-2 rounded cursor-not-allowed"
                                    disabled>Upload Now</button>
                            </div>
                        </div>

                        <!-- Right Section (Row 2) -->
                        <div class="space-y-4 w-full lg:w-1/2">
                            <div>
                                <label class="block text-sm font-medium">Location</label>
                            </div>

                            <div>
                                <div id="map" class="w-full h-48 rounded border"></div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium">Detail Address</label>
                                <input type="text" value="Malang City, East Java"
                                    class="w-full border rounded px-3 py-2">
                            </div>

                            <div class="flex gap-4">
                                <div class="flex-1">
                                    <label class="block text-sm font-medium">Lat</label>
                                    <input type="text" class="w-full border rounded px-3 py-2"
                                        placeholder="Lat lokasi">
                                </div>
                                <div class="flex-1">
                                    <label class="block text-sm font-medium">Long</label>
                                    <input type="text" class="w-full border rounded px-3 py-2"
                                        placeholder="Long lokasi">
                                </div>
                            </div>

                            <!-- Footer buttons -->
                            <div class="flex justify-end space-x-4 mt-6">
                                <button type="button" onclick="window.location.href='/user-checklock';"
                                    class="px-4 py-2 bg-gray-300 text-gray-700 rounded">Cancel</button>
                                <button class="px-4 py-2 bg-black text-white rounded">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script Upload -->
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
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Inisialisasi peta
            var defaultLat = -7.983908;
            var defaultLng = 112.621391;
            window.map = L.map('map').setView([defaultLat, defaultLng], 13);

            // Tambahkan tile layer OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Tambahkan marker yang bisa dipindah
            window.marker = L.marker([defaultLat, defaultLng], {draggable:true}).addTo(window.map);

            // Set nilai awal input
            document.querySelector('input[placeholder="Lat lokasi"]').value = defaultLat;
            document.querySelector('input[placeholder="Long lokasi"]').value = defaultLng;

            // Update input saat marker dipindah
            marker.on('dragend', function(e) {
                var latlng = marker.getLatLng();
                document.querySelector('input[placeholder="Lat lokasi"]').value = latlng.lat;
                document.querySelector('input[placeholder="Long lokasi"]').value = latlng.lng;
            });

            // Update marker & input saat peta diklik
            map.on('click', function(e) {
                marker.setLatLng(e.latlng);
                document.querySelector('input[placeholder="Lat lokasi"]').value = e.latlng.lat;
                document.querySelector('input[placeholder="Long lokasi"]').value = e.latlng.lng;
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Cek apakah browser mendukung Geolocation
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    // Ambil koordinat
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;

                    // Set nilai input
                    document.querySelector('input[placeholder="Lat lokasi"]').value = lat;
                    document.querySelector('input[placeholder="Long lokasi"]').value = lng;

                    // Update posisi marker dan peta
                    if (window.marker && window.map) {
                        window.marker.setLatLng([lat, lng]);
                        window.map.setView([lat, lng], 15);
                    }
                }, function(error) {
                    alert("Izin lokasi ditolak atau terjadi error.");
                });
            } else {
                alert("Browser tidak mendukung fitur lokasi.");
            }
        });
    </script>
</body>
</html>
