<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - HRIS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-sm text-gray-800">
    <div class="flex">
        {{-- Sidebar --}}
        @include('components.sidebar')

        <div class="flex-1 min-h-screen flex flex-col">
            {{-- Navbar --}}
            @include('components.navbar')

            <main class="px-6 pb-6 ml-20">
                <!-- Status Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-2 mx-6">
                    @foreach ([['Work Hours', '120h 54m', 'ri-time-line'], ['On Time', '20', 'ri-check-line'], ['Late', '5', 'ri-error-warning-line'], ['Absent', '10', 'ri-close-circle-line']] as $card)
                        <div class="bg-white p-4 rounded-lg shadow flex items-center space-x-4">
                            <i class="{{ $card[2] }} text-2xl text-blue-500"></i>
                            <div>
                                <p class="text-sm text-gray-500">{{ $card[0] }}</p>
                                <h3 class="text-xl font-bold">{{ $card[1] }}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Summary Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 p-6">
                    <!-- Attendance Summary -->
                    <div class="bg-white p-4 rounded-lg shadow">
                        <div class="flex justify-between items-center mb-3">
                            <h2 class="text-sm font-semibold">Attendance Summary</h2>
                            <select class="border text-xs rounded px-2 py-0.5">
                                <option>Months</option>
                            </select>
                        </div>
                        <canvas id="attendanceChart" class="w-32 h-32 mx-auto"></canvas>
                        <div class="flex justify-around mt-6 text-sm">
                            <span class="text-green-500">● Present</span>
                            <span class="text-blue-500">● Permit</span>
                            <span class="text-red-500">● Leave</span>
                            <span class="text-yellow-500">● Sick</span>
                        </div>
                    </div>

                    <!-- Leave Summary -->
                    <div class="bg-white p-4 rounded-lg shadow">
                        <!-- Header -->
                        <div class="flex justify-between items-center mb-3">
                            <h2 class="text-sm font-semibold">Leave Summary</h2>
                            <select class="border text-xs rounded px-2 py-1">
                                <option>Time Span</option>
                            </select>
                        </div>

                        <!-- Total Quota -->
                        <div class="bg-gray-50 rounded-lg text-center border p-3 mb-4">
                            <p class="text-xs text-gray-600 mb-1">Total Quota Annual Leave</p>
                            <h3 class="text-2xl font-bold mb-2">12 Days</h3>
                            <button
                                class="w-full bg-blue-900 text-white text-xs py-2 rounded-b-md hover:bg-blue-800 transition">
                                Request Leave ⟶
                            </button>
                        </div>

                        <!-- Taken & Remaining -->
                        <div class="grid grid-cols-2 gap-3 text-center">
                            <!-- Taken -->
                            <div class="bg-white rounded-lg text-center border p-3">
                                <p class="text-xs text-gray-600 mb-1">Taken</p>
                                <h3 class="text-xl font-bold mb-1">4 Days</h3>
                                <a href="#"
                                    class="block w-full bg-blue-100 text-blue-600 text-xs py-2 rounded-b-md hover:bg-blue-200 transition">
                                    See Details ⟶
                                </a>
                            </div>

                            <!-- Remaining -->
                            <div class="bg-white rounded-lg text-center border rounded-lg p-3">
                                <p class="text-xs text-gray-600 mb-1">Remaining</p>
                                <h3 class="text-xl font-bold mb-1">8 Days</h3>
                                <button
                                    class="block w-full bg-blue-100 text-blue-600 text-xs py-2 rounded-b-md hover:bg-blue-200 transition">
                                    Request Leave ⟶
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Work Hours Chart -->
                <div class="bg-white p-4 rounded-lg shadow mx-6">
                    <div class="flex justify-between items-center mb-2">
                        <h2 class="text-sm font-semibold">Your Work Hours</h2>
                        <select class="border text-xs rounded px-8 py-1">
                            <option>View By Month</option>
                        </select>
                    </div>
                    <canvas id="workHoursChart" class="w-full h-24"></canvas>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Attendance Donut Chart
        const attendanceChart = new Chart(document.getElementById('attendanceChart'), {
            type: 'doughnut',
            data: {
                labels: ['Present', 'Permit', 'Leave', 'Sick'],
                datasets: [{
                    data: [20, 5, 4, 2],
                    backgroundColor: ['#16a34a', '#3b82f6', '#ef4444', '#facc15'],
                    borderWidth: 1
                }]
            },
            options: {
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: true
                    }
                }
            }
        });

        // Work Hours Bar Chart
        const workHoursChart = new Chart(document.getElementById('workHoursChart'), {
            type: 'bar',
            data: {
                labels: ['March 20', 'March 21', 'March 22', 'March 23', 'March 24', 'March 25', 'March 26'],
                datasets: [{
                    label: 'Hours',
                    data: [7.8, 1.2, 3.5, 2.8, 6.7, 2.1, 3.4],
                    backgroundColor: '#3b82f6',
                    borderRadius: 4,
                    barThickness: 30
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        min: 0,
                        max: 8,
                        ticks: {
                            stepSize: 1,
                            callback: function(value) {
                                return [1, 4, 8].includes(value) ? `${value} hr` : '';
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: context => `${context.parsed.y.toFixed(2)} hr`
                        }
                    }
                }
            }

        });
    </script>
</body>

</html>
