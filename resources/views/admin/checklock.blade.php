<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Checklock</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
  <div class="flex h-screen">
    <!-- Sidebar -->
    @include('components.sidebar')

    <!-- Main content -->
    <div class="flex-1 flex flex-col ml-20">
        
        <!-- Navbar -->
        @include('components.navbar')

    <!-- Main content -->
      <!-- Main Table Content -->
      <div class="flex items-center justify-center px-6">
        <div class="bg-white p-6 rounded shadow-lg w-full max-w-6xl">
          <div class="flex justify-between mb-4">
            <h2 class="text-2xl font-semibold">Checklock Overview</h2>
            <div class="flex gap-2">
              <button class="border px-4 py-2 rounded">Filter</button>
              <a href="/admin-absensi">
                <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition duration-200">
                  + Add Data
                </button>
              </a>
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
              <tr>
                <td class="px-4 py-2">Juanita</td>
                <td class="px-4 py-2">CEO</td>
                <td class="px-4 py-2">08.00</td>
                <td class="px-4 py-2">18.30</td>
                <td class="px-4 py-2">10h 30m</td>
<td class="px-4 py-2">
  <button class="flex items-center gap-2 text-blue-600 hover:underline" onclick="openModal()">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M13.828 10.172a4 4 0 010 5.656m1.414-1.414a6 6 0 00-8.485-8.485m1.414 1.414a4 4 0 015.657 5.657" />
    </svg>
    <span>Buka</span>
  </button>
</td>

                <td class="px-4 py-2">
                  <span id="status-text" class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded text-xs">Waiting Approval</span>
                </td>
                <td class="px-4 py-2">
                  <button onclick="openDetailsModal()" class="bg-blue-500 text-white px-3 py-1 rounded text-xs inline-block text-center">View</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div id="approvalModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
      <div class="flex justify-between items-start">
        <div class="flex gap-3">
          <div class="w-12 h-12 rounded-full bg-blue-900"></div>
          <div>
            <h2 class="text-lg font-semibold">Approve Attendance</h2>
            <p class="text-sm text-gray-600">Are you sure want to approve this employee's attendance?<br>This action cannot be undone.</p>
          </div>
        </div>
        <button onclick="closeModal()" class="text-gray-600 hover:text-black text-xl font-bold">&times;</button>
      </div>

      <div class="mt-6 flex justify-center gap-4">
        <button onclick="rejectAction()" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded-lg">Reject</button>
        <button onclick="approveAction()" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded-lg">Approve</button>
      </div>
    </div>
  </div>

  <!-- Attendance Details Modal -->
<div id="attendanceDetailsModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-right z-50 hidden">
  <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-2xl">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-xl font-bold">Attendance Details</h2>
      <button onclick="closeDetailsModal()" class="text-gray-600 hover:text-black text-2xl font-bold">&times;</button>
    </div>

    <!-- Profile Section -->
    <div class="flex items-center justify-between border rounded p-4 mb-4">
      <div class="flex items-center gap-4">
        <div class="w-12 h-12 bg-blue-800 rounded-full"></div>
        <div>
          <div class="font-semibold">Nama Lengkap</div>
          <div class="text-sm text-gray-600">Jabatan</div>
        </div>
      </div>
      <span class="bg-gray-200 text-gray-700 text-xs px-3 py-1 rounded">Status Approve</span>
    </div>

    <!-- Attendance Info -->
    <div class="grid grid-cols-2 gap-4 mb-4 border rounded p-4">
      <div>
        <p class="text-sm text-gray-500">Date</p>
        <p class="font-semibold">1 March 2025</p>
      </div>
      <div>
        <p class="text-sm text-gray-500">Check In</p>
        <p class="font-semibold">09.00</p>
      </div>
      <div>
        <p class="text-sm text-gray-500">Check Out</p>
        <p class="font-semibold">15.00</p>
      </div>
      <div>
        <p class="text-sm text-gray-500">Status</p>
        <p class="font-semibold">Present</p>
      </div>
      <div>
        <p class="text-sm text-gray-500">Work Hours</p>
        <p class="font-semibold">9 Hours</p>
      </div>
    </div>

    <!-- Location Info -->
    <div class="border rounded p-4 mb-4">
      <h3 class="font-semibold mb-2">Location Information</h3>
      <p><strong>Location:</strong> Office</p>
      <p><strong>Detail Address:</strong> Jln. Soekarno Hatta No. 8, Jatimulyo, Lowokwaru, Kota Malang.</p>
      <p><strong>Lat:</strong> -2241720016</p>
      <p><strong>Long:</strong> 2241720119</p>
    </div>

    <!-- Proof of Attendance -->
    <div class="border rounded p-4">
      <h3 class="font-semibold mb-2">Proof of Attendance</h3>
      <div class="flex items-center gap-2">
        <span>Wa003198373738.img</span>
        <button class="text-blue-600 hover:underline text-sm">Download</button>
      </div>
    </div>
  </div>
</div>


  <!-- JavaScript -->
  <script>
    function openModal() {
      document.getElementById('approvalModal').classList.remove('hidden');
    }

    function closeModal() {
      document.getElementById('approvalModal').classList.add('hidden');
    }

    function approveAction() {
      document.getElementById('icon-check').classList.remove('hidden');
      document.getElementById('icon-cross').classList.add('hidden');
      const status = document.getElementById('status-text');
      status.textContent = "On Time";
      status.className = "bg-green-200 text-green-800 px-2 py-1 rounded text-xs";
      closeModal();
    }

    function rejectAction() {
      document.getElementById('icon-cross').classList.remove('hidden');
      document.getElementById('icon-check').classList.add('hidden');
      const status = document.getElementById('status-text');
      status.textContent = "Late";
      status.className = "bg-red-200 text-red-800 px-2 py-1 rounded text-xs";
      closeModal();
    }

    function openDetailsModal() {
    document.getElementById('attendanceDetailsModal').classList.remove('hidden');
  }

  function closeDetailsModal() {
    document.getElementById('attendanceDetailsModal').classList.add('hidden');
  }
  </script>
</body>
</html>
