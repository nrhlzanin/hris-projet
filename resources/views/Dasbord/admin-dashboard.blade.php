<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard - HRIS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-sm text-gray-800">
    <div class="flex">

        {{-- Sidebar --}}
        @include('components.sidebar')

        <div class="flex-1 min-h-screen flex flex-col">

            {{-- Navbar --}}
            @include('components.navbar')

            {{-- Content --}}
            <main class="px-6 pb-6 ml-20">
                {{-- Summary Cards --}}
                @php
                    $cardData = [
                        [
                            'title' => 'Total Employee',
                            'color' => 'green',
                            'class' => 'stat-total',
                            'icon' => 'ri-team-line',
                        ],
                        [
                            'title' => 'New Employees',
                            'color' => 'yellow',
                            'class' => 'stat-new',
                            'icon' => 'ri-user-add-line',
                        ],
                        [
                            'title' => 'Active Employees',
                            'color' => 'blue',
                            'class' => 'stat-active',
                            'icon' => 'ri-user-line',
                        ],
                        [
                            'title' => 'Resigned Employees',
                            'color' => 'red',
                            'class' => 'stat-resigned',
                            'icon' => 'ri-user-unfollow-line',
                        ],
                    ];
                @endphp

                <div class="grid grid-cols-4 gap-4 mb-6">
                    @foreach ($cardData as $card)
                        <div
                            class="bg-white rounded shadow border border-{{ $card['color'] }}-600 flex flex-col justify-between p-4">
                            <div class="flex items-center gap-2 mb-2">
                                <i class="{{ $card['icon'] }} text-xl text-{{ $card['color'] }}-600"></i>
                                <p class="text-sm font-semibold text-black">{{ $card['title'] }}</p>
                            </div>
                            <p class="text-3xl font-bold text-black {{ $card['class'] }}">0</p>
                            <div
                                class="text-xs text-white bg-{{ $card['color'] }}-600 mt-4 px-2 py-1 rounded text-center update-date">
                                Update {{ now()->format('F d, Y') }}
                            </div>
                        </div>
                    @endforeach
                </div>


                {{-- Charts --}}
                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div class="bg-white rounded p-4 shadow">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-semibold">Current Number of Employees</h3>
                            <select class="month-dropdown border rounded px-2 py-1 text-xs"></select>
                        </div>
                        <img src="/mnt/data/c2b798f1-8fb3-4876-b99b-0a006dc42950.png" alt="Bar Chart"
                            class="w-full rounded" />
                    </div>

                    <div class="bg-white rounded p-4 shadow">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-semibold">Employee Status</h3>
                            <select class="month-dropdown border rounded px-2 py-1 text-xs"></select>
                        </div>
                        <img src="/mnt/data/a17251be-6a78-4822-a83f-daf931ceb773.png" alt="Status Chart"
                            class="w-full rounded" />
                    </div>
                </div>

                {{-- Attendance --}}
                <div class="grid grid-cols-3 gap-6">
                    <div class="bg-white rounded p-4 shadow flex justify-center items-center">
                        <img src="/mnt/data/cf54d836-dc26-4138-a268-b040ce5cb51a.png" alt="Pie Chart"
                            class="w-64 h-64" />
                    </div>

                    <div class="col-span-2 bg-white rounded p-4 shadow">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-semibold">Employee Status</h3>
                            <select class="month-dropdown border rounded px-2 py-1 text-xs"></select>
                        </div>

                        <div id="loading" class="text-center text-gray-500 py-4">Loading...</div>

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

    {{-- Script --}}
    <script>
        function animateValue(el, start, end, duration) {
            let startTime = null;
            const step = (timestamp) => {
                if (!startTime) startTime = timestamp;
                const progress = Math.min((timestamp - startTime) / duration, 1);
                el.textContent = Math.floor(progress * (end - start) + start);
                if (progress < 1) window.requestAnimationFrame(step);
            };
            window.requestAnimationFrame(step);
        }

        const months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        document.querySelectorAll('.month-dropdown').forEach(select => {
            months.forEach(month => {
                const opt = document.createElement('option');
                opt.value = month;
                opt.textContent = month;
                select.appendChild(opt);
            });
        });

        fetch('/api/dashboard')
            .then(response => response.json())
            .then(data => {
                document.getElementById("loading").style.display = "none";

                animateValue(document.querySelector('.stat-total'), 0, data.totalEmployees, 800);
                animateValue(document.querySelector('.stat-new'), 0, data.newEmployees, 800);
                animateValue(document.querySelector('.stat-active'), 0, data.activeEmployees, 800);
                animateValue(document.querySelector('.stat-resigned'), 0, data.resignedEmployees, 800);

                document.querySelectorAll('.update-date').forEach(el => {
                    el.textContent = `Update ${data.lastUpdated}`;
                });

                const tbody = document.getElementById("employee-status-body");
                tbody.innerHTML = "";
                data.employeeStatusToday.forEach((item, index) => {
                    const color =
                        item.status === 'On Time' ? 'bg-green-600' :
                        item.status === 'Izin' ? 'bg-yellow-400' :
                        'bg-red-600';

                    const icon =
                        item.status === 'On Time' ? 'ri-check-line' :
                        item.status === 'Izin' ? 'ri-error-warning-line' :
                        'ri-close-line';

                    const row = document.createElement("tr");
                    row.innerHTML = `
            <td class="py-2">${index + 1}</td>
            <td>${item.name}</td>
            <td>
              <span class="inline-flex items-center gap-1 px-2 py-1 text-white text-xs rounded-full ${color}" title="${item.status}">
                <i class="${icon} text-xs"></i> ${item.status}
              </span>
            </td>
            <td>${item.checkIn}</td>
          `;
                    tbody.appendChild(row);
                });
            });
    </script>
</body>

</html>
