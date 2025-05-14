<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard - HRIS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0"></script>
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
                    {{-- Bar Chart --}}
                    <div class="bg-white rounded p-4 shadow">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-semibold">Current Number of Employees</h3>
                            <select id="monthSelect" class="border rounded px-2 py-1 text-xs">
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March" selected>March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <!-- Tambah bulan jika diperlukan -->
                            </select>
                        </div>
                        <canvas id="employeeChart" class="w-full rounded"></canvas>
                    </div>

                    {{-- Employee Status Chart --}}
                    <div class="bg-white rounded p-4 shadow">
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <p class="text-xs text-gray-500">Employee Statistics</p>
                                <h3 class="font-semibold">Employee Status</h3>
                            </div>
                            <select id="statusMonthSelect" class="border rounded px-2 py-1 text-xs">
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March" selected>March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                            </select>
                        </div>
                        <canvas id="statusChart" class="w-full rounded"></canvas>
                    </div>

                </div>

                {{-- Attendance Table --}}
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-white rounded p-4 shadow flex items-center justify-start space-x-4">
                        <!-- Fix ukuran canvas pie chart -->
                        <div class="flex-shrink-0">
                            <canvas id="attendancePieChart" width="250" height="250"
                                class="w-[250px] h-[250px]"></canvas>
                        </div>
                        <!-- Attendance Statistics -->
                        <div class="flex-grow">
                            <div class="text-xs text-gray-500 flex justify-between mb-1">
                                <span>Statistics</span>
                                <span>Today</span>
                            </div>
                            <div class="text-sm font-semibold flex justify-between text-black mb-3">
                                <span>Attendance</span>
                                <span>Tgl-Bln-Thn</span>
                            </div>
                            <div class="space-y-3 text-sm">
                                <!-- On time -->
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2">
                                        <span class="w-3 h-3 rounded-full bg-green-700 inline-block"></span>
                                        On time
                                    </div>
                                    <span id="ontime-count" class="font-semibold text-sm">142</span>
                                </div>

                                <!-- Late -->
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2">
                                        <span class="w-3 h-3 rounded-full bg-red-600 inline-block"></span>
                                        Late
                                    </div>
                                    <span id="late-count" class="font-semibold text-sm">34</span>
                                </div>

                                <!-- Absent -->
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2">
                                        <span class="w-3 h-3 rounded-full bg-yellow-400 inline-block"></span>
                                        Absent
                                    </div>
                                    <span id="absent-count" class="font-semibold text-sm">9</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Employee Status Table -->
                    <div class="bg-white rounded-xl p-4 shadow text-sm">
                        <!-- Header -->
                        <div class="mb-3">
                            <!-- Judul -->
                            <div class="flex justify-between items-center">
                                <h3 class="text-base font-semibold text-black">Employee Status</h3>
                                <!-- Select Month -->
                                <select class="border rounded px-2 py-1 text-xs">
                                    <option>Select Month</option>
                                </select>
                            </div>

                            <!-- Statistik di bawah judul -->
                            <div class="flex gap-6 mt-2 text-gray-700 font-medium text-sm">
                                <div class="flex items-center gap-1">
                                    <span class="w-2 h-2 rounded-full bg-green-700 inline-block"></span>
                                    <span class="font-semibold text-black">142</span> On time
                                </div>
                                <div class="flex items-center gap-1">
                                    <span class="w-2 h-2 rounded-full bg-red-600 inline-block"></span>
                                    <span class="font-semibold text-black">4</span> Late
                                </div>
                                <div class="flex items-center gap-1">
                                    <span class="w-2 h-2 rounded-full bg-yellow-400 inline-block"></span>
                                    <span class="font-semibold text-black">9</span> Absent
                                </div>
                            </div>
                        </div>


                        <!-- Table -->
                        <table class="w-full text-left border-t text-sm">
                            <thead class="bg-gray-100 text-gray-600">
                                <tr>
                                    <th class="py-2 px-2">No</th>
                                    <th class="py-2 px-2">Nama</th>
                                    <th class="py-2 px-2">Status Kehadiran</th>
                                    <th class="py-2 px-2">Check In</th>
                                </tr>
                            </thead>
                            <tbody id="employee-status-body" class="text-gray-700">
                                <tr class="border-t">
                                    <td class="py-2 px-2">1</td>
                                    <td class="py-2 px-2">Johan</td>
                                    <td class="py-2 px-2">
                                        <span class="bg-green-700 text-white text-xs px-3 py-1 rounded-full">On
                                            Time</span>
                                    </td>
                                    <td class="py-2 px-2">08.00</td>
                                </tr>
                                <tr class="border-t">
                                    <td class="py-2 px-2">2</td>
                                    <td class="py-2 px-2">Timothy Moore</td>
                                    <td class="py-2 px-2">
                                        <span
                                            class="bg-yellow-400 text-white text-xs px-3 py-1 rounded-full">Absent</span>
                                    </td>
                                    <td class="py-2 px-2">09.00</td>
                                </tr>
                                <tr class="border-t">
                                    <td class="py-2 px-2">3</td>
                                    <td class="py-2 px-2">Bob Doe</td>
                                    <td class="py-2 px-2">
                                        <span class="bg-red-600 text-white text-xs px-3 py-1 rounded-full">Late</span>
                                    </td>
                                    <td class="py-2 px-2">08.15</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </main>
        </div>
    </div>

    {{-- Scripts --}}
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

        // Populate month dropdowns
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

        // Fetch API data
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
                        item.status === 'On Time' ? 'bg-green-700' :
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

        // Chart.js Logic
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('employeeChart').getContext('2d');

            const dataPerMonth = {
                January: [12, 8, 5],
                February: [10, 6, 7],
                March: [15, 10, 20],
                April: [18, 12, 6],
                May: [20, 15, 4],
            };

            const monthSelect = document.getElementById('monthSelect');
            let initialMonth = monthSelect.value;

            const employeeChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['New', 'Active', 'Resign'],
                    datasets: [{
                        label: 'Jumlah Karyawan',
                        data: dataPerMonth[initialMonth] || [0, 0, 0],
                        backgroundColor: ['#1E3A5F', '#2D8EFF', ' #7CA5BF'],
                        borderRadius: 8,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: true
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    }
                }
            });

            monthSelect.addEventListener('change', function() {
                const selectedMonth = this.value;
                const newData = dataPerMonth[selectedMonth] || [0, 0, 0];
                employeeChart.data.datasets[0].data = newData;
                employeeChart.update();
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const statusCtx = document.getElementById('statusChart').getContext('2d');

            const statusDataPerMonth = {
                January: [20, 30, 50, 40],
                February: [25, 35, 55, 45],
                March: [23, 46, 64, 75],
                April: [28, 32, 60, 70],
                May: [30, 40, 70, 80],
            };

            const statusLabels = ["Tetap Permanen", "Tetap Percobaan", "PKWT (Kontrak)", "Magang"];
            const statusColors = ["#bfdbfe", "#7CA5BF", "#2D8EFF", "#1E3A5F"];

            const statusMonthSelect = document.getElementById('statusMonthSelect');
            let statusChart = new Chart(statusCtx, {
                type: 'bar',
                data: {
                    labels: statusLabels,
                    datasets: [{
                        label: 'Jumlah',
                        data: statusDataPerMonth[statusMonthSelect.value] || [0, 0, 0, 0],
                        backgroundColor: statusColors,
                        borderRadius: 6,
                        borderSkipped: false,
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: true
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            max: 150,
                            ticks: {
                                stepSize: 25
                            }
                        },
                        y: {
                            ticks: {
                                callback: function(value) {
                                    return statusLabels[value] || value;
                                }
                            }
                        }
                    }
                }
            });

            statusMonthSelect.addEventListener('change', function() {
                const selected = this.value;
                statusChart.data.datasets[0].data = statusDataPerMonth[selected] || [0, 0, 0, 0];
                statusChart.update();
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const pieCtx = document.getElementById('attendancePieChart').getContext('2d');

            const attendanceData = {
                ontime: 142,
                late: 34,
                absent: 9
            };

            const total = attendanceData.ontime + attendanceData.late + attendanceData.absent;

            document.getElementById('ontime-count').textContent = attendanceData.ontime;
            document.getElementById('late-count').textContent = attendanceData.late;
            document.getElementById('absent-count').textContent = attendanceData.absent;

            const pieChart = new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: ['On time', 'Late', 'Absent'],
                    datasets: [{
                        data: [
                            attendanceData.ontime,
                            attendanceData.late,
                            attendanceData.absent
                        ],
                        backgroundColor: ['#15803d', '#dc2626', '#facc15'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const value = context.parsed;
                                    const percentage = ((value / total) * 100).toFixed(2);
                                    return `${context.label}: ${percentage}%`;
                                }
                            }
                        },
                        datalabels: {
                            color: '#fff',
                            font: {
                                weight: 'bold',
                                size: 12
                            },
                            formatter: function(value) {
                                const percentage = ((value / total) * 100).toFixed(1);
                                return `${percentage}%`;
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels]
            });
        });
    </script>
</body>

</html>
