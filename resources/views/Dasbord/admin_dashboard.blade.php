<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard - HRIS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
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

        <!-- Content -->
        <main class="p-6 space-y-6 overflow-y-auto">
          <!-- Summary Cards -->
          <div class="grid grid-cols-4 gap-4">
            <div class="bg-white rounded shadow border border-green-600 flex flex-col justify-between p-4">
              <div>
                <img src="/icons/employees.svg" class="w-6 h-6 mb-2" />
                <p class="text-sm text-gray-500 font-semibold">Total Employee</p>
                <p class="text-3xl font-bold stat-total">0</p>
              </div>
              <div class="text-xs text-white bg-green-600 mt-4 px-2 py-1 rounded text-center update-date"></div>
            </div>

            <div class="bg-white rounded shadow border border-yellow-500 flex flex-col justify-between p-4">
              <div>
                <img src="/icons/employees.svg" class="w-6 h-6 mb-2" />
                <p class="text-sm text-gray-500 font-semibold">New Employees</p>
                <p class="text-3xl font-bold stat-new">0</p>
              </div>
              <div class="text-xs text-white bg-yellow-500 mt-4 px-2 py-1 rounded text-center update-date"></div>
            </div>

            <div class="bg-white rounded shadow border border-blue-500 flex flex-col justify-between p-4">
              <div>
                <img src="/icons/employees.svg" class="w-6 h-6 mb-2" />
                <p class="text-sm text-gray-500 font-semibold">Active Employees</p>
                <p class="text-3xl font-bold stat-active">0</p>
              </div>
              <div class="text-xs text-white bg-blue-500 mt-4 px-2 py-1 rounded text-center update-date"></div>
            </div>

            <div class="bg-white rounded shadow border border-red-600 flex flex-col justify-between p-4">
              <div>
                <img src="/icons/employees.svg" class="w-6 h-6 mb-2" />
                <p class="text-sm text-gray-500 font-semibold">Resigned Employees</p>
                <p class="text-3xl font-bold stat-resigned">0</p>
              </div>
              <div class="text-xs text-white bg-red-600 mt-4 px-2 py-1 rounded text-center update-date"></div>
            </div>
          </div>

          <!-- Charts -->
          <div class="grid grid-cols-2 gap-6">
            <div class="bg-white rounded p-4 shadow">
              <div class="flex justify-between items-center mb-4">
                <h3 class="font-semibold">Current Number of Employees</h3>
                <select class="border rounded px-2 py-1 text-xs">
                  <option>Select Month</option>
                </select>
              </div>
              <img src="/mnt/data/c2b798f1-8fb3-4876-b99b-0a006dc42950.png" alt="Bar Chart" class="w-full rounded" />
            </div>
            <div class="bg-white rounded p-4 shadow">
              <div class="flex justify-between items-center mb-4">
                <h3 class="font-semibold">Employee Status</h3>
                <select class="border rounded px-2 py-1 text-xs">
                  <option>Select Month</option>
                </select>
              </div>
              <img src="/mnt/data/a17251be-6a78-4822-a83f-daf931ceb773.png" alt="Status Chart" class="w-full rounded" />
            </div>
          </div>

          <!-- Attendance -->
          <div class="grid grid-cols-3 gap-6">
            <div class="bg-white rounded p-4 shadow flex justify-center items-center">
              <img src="/mnt/data/cf54d836-dc26-4138-a268-b040ce5cb51a.png" alt="Pie Chart" class="w-64 h-64" />
            </div>
            <div class="col-span-2 bg-white rounded p-4 shadow">
              <div class="flex justify-between items-center mb-4">
                <h3 class="font-semibold">Employee Status</h3>
                <select class="border rounded px-2 py-1 text-xs">
                  <option>Select Month</option>
                </select>
              </div>
              <table class="w-full text-left">
                <thead>
                  <tr class="border-b font-semibold">
                    <th class="py-2">No</th>
                    <th>Nama</th>
                    <th>Status Kehadiran</th>
                    <th>Check In</th>
                  </tr>
                </thead>
                <tbody id="employee-status-body"></tbody>
              </table>
            </div>
          </div>
        </main>
      </div>
    </div>

    <script>
      fetch('/api/dashboard')
        .then(response => response.json())
        .then(data => {
          document.querySelector('.stat-total').textContent = data.totalEmployees;
          document.querySelector('.stat-new').textContent = data.newEmployees;
          document.querySelector('.stat-active').textContent = data.activeEmployees;
          document.querySelector('.stat-resigned').textContent = data.resignedEmployees;

          document.querySelectorAll('.update-date').forEach(el => {
            el.textContent = `Update ${data.lastUpdated}`;
          });

          const tbody = document.getElementById("employee-status-body");
          tbody.innerHTML = "";
          data.employeeStatusToday.forEach((item, index) => {
            const color = item.status === 'On Time' ? 'bg-green-600' :
                          item.status === 'Izin' ? 'bg-yellow-400' : 'bg-red-600';
            const row = document.createElement("tr");
            row.innerHTML = `
              <td class="py-2">${index + 1}</td>
              <td>${item.name}</td>
              <td><span class="inline-block px-2 py-1 text-white text-xs rounded-full ${color}">${item.status}</span></td>
              <td>${item.checkIn}</td>
            `;
            tbody.appendChild(row);
          });
        });
    </script>
  </body>
</html>
