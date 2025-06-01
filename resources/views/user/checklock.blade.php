<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checklock Overview</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        <!-- Checklock Overview -->
        <div class="flex items-center justify-center">
            <div class="bg-white p-6 rounded shadow-lg w-full max-w-6xl">
                    <div class="flex justify-between mb-4">
                    <h2 class="text-xl font-semibold text-gray-800">Checklock Overview</h2>
                    <div class="flex flex-col md:flex-row items-stretch gap-2">
                        <input type="text" placeholder="Search Employee" class="px-3 py-2 border rounded-md focus:ring focus:border-blue-300 w-full md:w-auto">
                        <a href="{{ route('user.checklock') }}">
                            <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 flex items-center">
                                <i class="ri-refresh-line mr-2"></i> Reset Sort
                            </button>
                        </a>
                        <a href="{{ route('user.absensi') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-center flex items-center">
                            <i class="ri-add-line mr-2"></i> Add Data
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left border rounded">
                        <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="p-3">
                                <a href="{{ route('user.checklock', ['sort' => 'date', 'direction' => request('sort') == 'date' && request('direction') == 'asc' ? 'desc' : 'asc']) }}" class="flex items-center gap-1">
                                    Date
                                    @if(request('sort') == 'date')
                                        @if(request('direction') == 'asc')
                                            <i class="ri-arrow-up-s-line text-blue-500"></i>
                                        @else
                                            <i class="ri-arrow-down-s-line text-blue-500"></i>
                                        @endif
                                    @else
                                        <i class="ri-arrow-up-down-line text-gray-400"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="p-3">
                                <a href="{{ route('user.checklock', ['sort' => 'clock_in', 'direction' => request('sort') == 'clock_in' && request('direction') == 'asc' ? 'desc' : 'asc']) }}" class="flex items-center gap-1">
                                    Clock In
                                    @if(request('sort') == 'clock_in')
                                        @if(request('direction') == 'asc')
                                            <i class="ri-arrow-up-s-line text-blue-500"></i>
                                        @else
                                            <i class="ri-arrow-down-s-line text-blue-500"></i>
                                        @endif
                                    @else
                                        <i class="ri-arrow-up-down-line text-gray-400"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="p-3">
                                <a href="{{ route('user.checklock', ['sort' => 'clock_out', 'direction' => request('sort') == 'clock_out' && request('direction') == 'asc' ? 'desc' : 'asc']) }}" class="flex items-center gap-1">
                                    Clock Out
                                    @if(request('sort') == 'clock_out')
                                        @if(request('direction') == 'asc')
                                            <i class="ri-arrow-up-s-line text-blue-500"></i>
                                        @else
                                            <i class="ri-arrow-down-s-line text-blue-500"></i>
                                        @endif
                                    @else
                                        <i class="ri-arrow-up-down-line text-gray-400"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="p-3">
                                <a href="{{ route('user.checklock', ['sort' => 'work_hours', 'direction' => request('sort') == 'work_hours' && request('direction') == 'asc' ? 'desc' : 'asc']) }}" class="flex items-center gap-1">
                                    Work Hours
                                    @if(request('sort') == 'work_hours')
                                        @if(request('direction') == 'asc')
                                            <i class="ri-arrow-up-s-line text-blue-500"></i>
                                        @else
                                            <i class="ri-arrow-down-s-line text-blue-500"></i>
                                        @endif
                                    @else
                                        <i class="ri-arrow-up-down-line text-gray-400"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="p-3 text-center">
                                <a href="{{ route('user.checklock', ['sort' => 'status', 'direction' => request('sort') == 'status' && request('direction') == 'asc' ? 'desc' : 'asc']) }}" class="flex items-center gap-1 justify-center">
                                    Status
                                    @if(request('sort') == 'status')
                                        @if(request('direction') == 'asc')
                                            <i class="ri-arrow-up-s-line text-blue-500"></i>
                                        @else
                                            <i class="ri-arrow-down-s-line text-blue-500"></i>
                                        @endif
                                    @else
                                        <i class="ri-arrow-up-down-line text-gray-400"></i>
                                    @endif
                                </a>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y">
                        <tr>
                            <td class="p-3">March 01, 2025</td>
                            <td class="p-3">09:28 AM</td>
                            <td class="p-3">04:00 PM</td>
                            <td class="p-3">10h 5m</td>
                            <td class="p-3 text-center">
                                <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs">On Time</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3">March 02, 2025</td>
                            <td class="p-3">09:30 AM</td>
                            <td class="p-3">04:30 PM</td>
                            <td class="p-3">8h 50m</td>
                            <td class="p-3 text-center">
                                <span class="bg-red-600 text-white px-2 py-1 rounded-full text-xs">Late</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3">March 02, 2025</td>
                            <td class="p-3">09:30 AM</td>
                            <td class="p-3">04:30 PM</td>
                            <td class="p-3">8h 50m</td>
                            <td class="p-3 text-center">
                                <span class="bg-red-600 text-white px-2 py-1 rounded-full text-xs">Late</span>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6 flex flex-col md:flex-row md:justify-between items-center text-sm text-gray-500">
                    <div class="mb-2 md:mb-0">
                        Showing 
                        <select class="border rounded px-2 py-1 ml-1">
                            <option>10</option>
                        </select> 
                        out of 60 records
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="px-3 py-1 border rounded hover:bg-gray-200">1</button>
                        <button class="px-3 py-1 border rounded bg-blue-500 text-white">2</button>
                        <button class="px-3 py-1 border rounded hover:bg-gray-200">3</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>
